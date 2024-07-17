<?php

namespace App\DataTables\Admin;

use App\Models\Shop;
use App\Utils\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShopsDataTable extends DataTable
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
        return (new EloquentDataTable($query))
            ->editColumn('check', fn ($model) => $model)
            ->editColumn('image', fn ($model) => editImageColumn(image: strlen($model->getFirstMediaUrl('shops')) > 0 ? $model->getFirstMediaUrl('shops') : asset('admin-assets/img/do_not_delete/do_not_delete.png'), name: $model->name, width: 50))
            ->editColumn('updated_at', fn ($model) => editDateTimeColumn($model->updated_at))
            ->editColumn('status', fn ($model) => editStatusColumn($model->status->value))
            ->editColumn('actions', fn ($model) => view('admin.sellers.shops.actions', ['seller' => $this->seller->id, 'shop' => $model->id,]))
            ->setRowId('id')
            ->rawColumns(array_column($this->getColumns(), 'data'));
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Shop $model): QueryBuilder
    {
        return $model->newQuery()->where('seller_id', $this->seller->id);
    }

    public function html(): HtmlBuilder
    {
        $buttons = [];

        if (auth()->user()->can('admin.sellers.shops.create')) {
            $buttons[] = Button::raw('add-new')
                ->addClass('btn btn-primary waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add New')
                ->attr([
                    'onclick' => 'addNew()',
                ]);
        }

        if (auth()->user()->can('   admin.sellers.shops.export')) {
            $buttons[] = Button::make('export')
                ->addClass('btn btn-primary waves-effect waves-float waves-light dropdown-toggle m-1')
                ->buttons([
                    Button::make('print')->addClass('dropdown-item')->text('<i class="fa-solid fa-print"></i>&nbsp;&nbsp;Print'),
                    Button::make('copy')->addClass('dropdown-item')->text('<i class="fa-solid fa-copy"></i>&nbsp;&nbsp;Copy'),
                    Button::make('csv')->addClass('dropdown-item')->text('<i class="fa-solid fa-file-csv"></i>&nbsp;&nbsp;CSV'),
                    Button::make('excel')->addClass('dropdown-item')->text('<i class="fa-solid fa-file-excel"></i>&nbsp;&nbsp;Excel'),
                    Button::make('pdf')->addClass('dropdown-item')->text('<i class="fa-solid fa-file-pdf"></i>&nbsp;&nbsp;PDF'),
                ]);
        }

        $buttons = array_merge($buttons, [
            Button::make('reset')->addClass('btn btn-danger waves-effect waves-float waves-light m-1'),
            Button::make('reload')->addClass('btn btn-primary waves-effect waves-float waves-light m-1'),
        ]);

        if (auth()->user()->can('admin.sellers.shops.destroy')) {
            $buttons[] = Button::raw('delete-selected')
                ->addClass('btn btn-danger waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-minus"></i>&nbsp;&nbsp;<span id="delete_selected_count" style="display:none">0</span> Delete Selected')
                ->attr([
                    'onclick' => 'deleteSelected()',
                ]);
        }

        return $this->builder()
            ->setTableId('shops-table')
            ->addTableClass('table-borderless table-striped table-hover class-datatable-for-event')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()

            ->scrollX()
            ->pagingType('full_numbers')
            ->lengthMenu([
                [30, 50, 70, 100, 120, 150, -1],
                [30, 50, 70, 100, 120, 150, 'All'],
            ])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"d-flex justify-content-between mx-0 pb-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->buttons($buttons)
            // ->rowGroupDataSrc('parent_id')
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
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this, \"danger\")\" type=\"checkbox\" value=\"' + role.id + '\" name=\"checkForDelete[]\" id=\"checkForDelete_' + role.id + '\" /><label class=\"form-check-label\" for=\"chkRole_' + role.id + '\"></label></div>';
                    }",
                    'checkboxes' => [
                        'selectAllRender' => '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                    ],
                ],
            ])
            ->fixedColumns([
                'left' => 1,
                'right' => 1,
            ])
            ->orders([
                [8, 'desc'],
            ]);
    }

    /**
     * Get columns.
     */
    protected function getColumns(): array
    {
        $columnClass = 'text-nowrap align-middle text-center';
        $checkColumn = Column::computed('check')->exportable(false)->printable(false)->width(60)->addClass($columnClass);

        if (auth()->user()->can('admin.sellers.shops.destroy')) {
            $checkColumn->addClass('disabled');
        }

        return [
            $checkColumn,

            Column::make('image')->addClass($columnClass),

            Column::make('name')->addClass($columnClass),

            Column::make('slug')->addClass($columnClass),
            Column::make('email')->addClass($columnClass),

            Column::make('phone_1')->addClass($columnClass),
            Column::make('phone_2')->addClass($columnClass),

            Column::make('manager_name')->addClass($columnClass),
            Column::make('manager_mobile')->addClass($columnClass),
            Column::make('manager_email')->addClass($columnClass),

            Column::make('status')->addClass($columnClass),

            Column::make('updated_at')->addClass($columnClass),

            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
        ];
    }
}
