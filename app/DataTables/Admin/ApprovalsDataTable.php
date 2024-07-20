<?php

namespace App\DataTables\Admin;

use App\Models\Product;
use App\Models\Seller;
use App\Models\Shop;
use App\Utils\Enums\Status;
use App\Utils\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ApprovalsDataTable extends DataTable
{
    use DataTableTrait;

    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query)
    {
        $columns = array_column($this->getColumns(), 'data');

        $eloquentDataTable = (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn('check', fn ($model) => $model)
            ->editColumn('status', fn ($model) => editStatusColumn($model->status->value))
            ->editColumn('created_at', fn ($model) => editDateTimeColumn($model->created_at))
            ->editColumn('updated_at', fn ($model) => editDateTimeColumn($model->updated_at))
            ->editColumn('actions', fn ($model) => view('admin.approvals.actions', ['id' => $model->id, 'for' => $this->model]))
            ->rawColumns($columns);

        if ($this->model === 'sellers')
        {
            $eloquentDataTable->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("LOWER(CAST(CONCAT(first_name, ' ', middle_name, ' ', last_name) as TEXT)) like ? OR CAST(CONCAT(first_name, ' ', middle_name, ' ', last_name) as TEXT) like ?", ["%{$keyword}%", "%{$keyword}%"]);
            })->orderColumn('name', function ($query, $order) {
                $query->orderBy('first_name', $order);
            });
        }

        return $eloquentDataTable;
    }

    /**
     * Get query source of dataTable.
     */
    public function query(): QueryBuilder
    {

        $model = match ($this->model) {
            'shops' => (new Shop()),
            'products' => (new Product()),
            'sellers' => (new Seller()),
        };

        return $model->newQuery()->whereIn('status', [Status::PENDING_APPROVAL, Status::OBJECTED]);
    }

    public function html(): HtmlBuilder
    {
        $buttons = [
            Button::raw('button-active')
                ->addClass('btn btn-success waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-circle-check"></i>')
                ->attr([
                    'onclick' => 'rowStatusChange("approve")',
                ]),
            Button::raw('button-object')
                ->addClass('btn btn-danger waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-circle-xmark"></i>')
                ->attr([
                    'onclick' => 'rowStatusChange("object")',
                ]),
            Button::make('export')
                ->addClass('btn btn-primary waves-effect waves-float waves-light dropdown-toggle m-1')
                ->buttons([
                    Button::make('print')->addClass('dropdown-item')->text('<i class="fa-solid fa-print"></i>&nbsp;&nbsp;Print'),
                    Button::make('copy')->addClass('dropdown-item')->text('<i class="fa-solid fa-copy"></i>&nbsp;&nbsp;Copy'),
                    Button::make('csv')->addClass('dropdown-item')->text('<i class="fa-solid fa-file-csv"></i>&nbsp;&nbsp;CSV'),
                    Button::make('excel')->addClass('dropdown-item')->text('<i class="fa-solid fa-file-excel"></i>&nbsp;&nbsp;Excel'),
                    Button::make('pdf')->addClass('dropdown-item')->text('<i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF'),
                ]),
            Button::make('reset')->addClass('btn btn-danger waves-effect waves-float waves-light m-1'),
            Button::make('reload')->addClass('btn btn-primary waves-effect waves-float waves-light m-1'),

        ];

        return $this->builder()
            ->setTableId('roles-table')
            ->columns($this->getColumns())
            ->addTableClass('table-borderless table-striped table-hover class-datatable-for-event')
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()

            ->lengthMenu([
                [30, 50, 70, 100, 120, 150, -1],
                [30, 50, 70, 100, 120, 150, 'All'],
            ])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"d-flex justify-content-between mx-0 pb-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->buttons($buttons)
            ->scrollX()
            ->pagingType('full_numbers')
            ->columnDefs([
                [
                    'targets' => 0,
                    'className' => 'text-center text-primary',
                    'width' => '10%',
                    'orderable' => false,
                    'searchable' => false,
                    'responsivePriority' => 3,
                    'render' => "function (data, type, full, setting) {
                        var role = JSON.parse(data);
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this, \'primary\')\" type=\"checkbox\" value=\"' + role.id + '\" name=\"checkForDelete[]\" id=\"checkForDelete_' + role.id + '\" /><label class=\"form-check-label\" for=\"chkAdmin_' + role.id + '\"></label></div>';
                    }",
                    'checkboxes' => [
                        'selectAllRender' => '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                    ],
                ],
            ])
            ->select([
                'style' => 'multi',
            ])
            ->fixedColumns([
                'left' => 1,
                'right' => 1,
            ])
            ->orders([
                [1, 'asc'],
            ]);
    }

    /**
     * Get columns.
     */
    protected function getColumns(): array
    {
        $columnClass = 'text-nowrap align-middle text-center';
        $columns = [
            Column::computed('check')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
            Column::make('name')->addClass($columnClass),
        ];

        $columns = match ($this->model) {
            'shops' => array_merge($columns, [
                Column::make('address')->addClass($columnClass),
                Column::make('slug')->addClass($columnClass),
            ]),
            'products' => array_merge($columns, [
                Column::make('model_no')->addClass($columnClass),
                Column::make('permalink')->addClass($columnClass),
            ]),
            'seller' => array_merge($columns, []),
            default => array_merge($columns, []),
        };

        $columns = array_merge($columns, [
            Column::make('status')->addClass($columnClass),
            Column::make('created_at')->addClass($columnClass),
            Column::make('updated_at')->addClass($columnClass),
            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
        ]);

        return $columns;
    }
}
