<?php

namespace App\DataTables\Seller;

use App\Models\Shop;
use App\Utils\Traits\DatatablesTrait;
use Illuminate\Http\Response;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Barryvdh\DomPDF\Facade\Pdf;

class ShopsDataTable extends DataTable
{
    use DatatablesTrait;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $columns = array_column($this->getColumns(), 'data');
        return (new EloquentDataTable($query))
            ->editColumn('check', function ($shop) {
                return $shop;
            })
            ->editColumn('created_at', function ($shop) {
                return editDateColumn($shop->created_at);
            })
            ->editColumn('updated_at', function ($shop) {
                return editDateColumn($shop->updated_at);
            })
            ->editColumn('actions', function ($shop) {
                return view('seller.shops.actions', ['id' => $shop->id]);
            })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['action', 'check']));
    }

    /**
     * Get query source of dataTable.
     *
     * @param Shop $model
     * @return QueryBuilder
     */
    public function query(Shop $model): QueryBuilder
    {
        return $model->newQuery()->where('seller_id', auth()->guard('seller')->user()->id);
    }

    public function html(): HtmlBuilder
    {
        $buttons = [
            Button::raw('add-new')
                ->addClass('btn btn-primary')
                ->text('<i class="icon material-icons md-add text-white "></i>Add New')
                ->attr([
                    'onclick' => 'addNew()',
                ]),
            Button::make('export')
                ->addClass('btn btn-primary dropdown-toggle')
                ->text('<i class="icon material-icons md-cloud_download text-white "></i>Export')
                ->buttons([
                    Button::make('print')->addClass('dropdown-item')->text('<i class="icon material-icons md-local_printshop"></i>Print'),
                    Button::make('copy')->addClass('dropdown-item')->text('<i class="icon material-icons md-content_copy"></i>Copy'),
                    Button::make('csv')->addClass('dropdown-item')->text('<i class="icon material-icons md-picture_as_pdf"></i>CSV'),
                    Button::make('excel')->addClass('dropdown-item')->text('<i class="icon material-icons md-picture_as_pdf"></i>Excel'),
                    Button::make('pdf')->addClass('dropdown-item')->text('<i class="icon material-icons md-picture_as_pdf"></i>PDF'),
                ]),
            Button::make('reset')->addClass('btn btn-danger'),
            Button::make('reload')->addClass('btn btn-primary'),
            Button::raw('delete-selected')
                ->addClass('btn btn-danger')
                ->text('<i class="icon material-icons md-delete"></i><span id="delete_selected_count" style="display:none">0</span> Delete Selected')
                ->attr([
                    'onclick' => 'deleteSelected()',
                ])
        ];

        return $this->builder()
            ->serverSide()
            ->processing()
            ->scrollX()
            ->minifiedAjax()
            ->deferRender()
            ->setTableId('categories-table')
            ->addTableClass('table-borderless table-striped table-hover class-datatable-for-event w-100')
            ->columns($this->getColumns())
            ->buttons($buttons)
            ->paging()
            ->pagingType('full_numbers')
            ->lengthMenu([
                [30, 50, 70, 100, 120, 150, -1],
                [30, 50, 70, 100, 120, 150, "All"],
            ])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>> <"d-flex justify-content-between align-items-center my-3 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>> t<"d-flex justify-content-between mt-3 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->columnDefs([
                [
                    'targets' => 0,
                    'className' => 'text-center align-middle text-primary',
                    'width' => '10%',
                    'orderable' => false,
                    'searchable' => false,
                    'responsivePriority' => 3,
                    'render' => "function (data, type, full, setting) {
                        var role = JSON.parse(data);
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this, \"danger\")\" type=\"checkbox\" value=\"' + role.id + '\" name=\"checkForDelete[]\" id=\"checkForDelete_' + role.id + '\" /><label class=\"form-check-label\" for=\"chkRole_' + role.id + '\"></label></div>';
                    }",
                    'checkboxes' => [
                        'selectAllRender' =>  '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                    ]
                ],
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
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('check')->exportable(false)->printable(false)->width(60)->addClass('text-nowrap align-middle text-center'),
            Column::make('name')->title('Name')->addClass('text-nowrap align-middle text-center'),
            Column::make('slug')->title('Slug')->addClass('text-nowrap align-middle text-center'),
            Column::make('created_at')->addClass('text-nowrap align-middle text-center'),
            Column::make('updated_at')->addClass('text-nowrap align-middle text-center'),
            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-nowrap align-middle text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'shops_' . date('YmdHis');
    }
}
