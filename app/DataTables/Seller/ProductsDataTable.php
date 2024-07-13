<?php

namespace App\DataTables\Seller;

use App\Models\Product;
use App\Utils\Traits\DatatablesTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    use DatatablesTrait;

    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $columns = array_column($this->getColumns(), 'data');

        return (new EloquentDataTable($query))
            ->editColumn('check', function ($product) {
                return $product;
            })
            ->editColumn('price', function ($product) {
                return 'Rs. ' . ($product->price > 0 ? $product->price : '-');
            })
            ->editColumn('discounted_price', function ($product) {
                return $product->discounted_price > 0 ? 'Rs. ' . $product->discounted_price : '-';
            })
            ->editColumn('status', function ($product) {
                return editStatusColumn($product->status);
            })
            ->editColumn('updated_at', function ($product) {
                return editDateColumn($product->updated_at);
            })
            ->editColumn('actions', function ($product) {
                return view('seller.products.actions', ['id' => $product->id]);
            })
            ->setRowId('id')
            ->rawColumns($columns);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->where('seller_id', auth()->guard('seller')->user()->id);
    }

    public function html(): HtmlBuilder
    {
        $buttons = [
            Button::raw('add-new')
                ->addClass('btn btn-primary waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add New')
                ->attr([
                    'onclick' => 'addNew()',
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
            Button::make('reset')->addClass('btn btn-danger'),
            Button::make('reload')->addClass('btn btn-primary'),
            Button::raw('delete-selected')
                ->addClass('btn btn-danger waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-minus"></i>&nbsp;&nbsp;<span id="delete_selected_count" style="display:none">0</span> Delete Selected')
                ->attr([
                    'onclick' => 'deleteSelected()',
                ]),
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
                [30, 50, 70, 100, 120, 150, 'All'],
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
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this, \'danger\')\" type=\"checkbox\" value=\"' + role.id + '\" name=\"checkForDelete[]\" id=\"checkForDelete_' + role.id + '\" /><label class=\"form-check-label\" for=\"chkRole_' + role.id + '\"></label></div>';
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
                [1, 'asc'],
            ]);
    }

    /**
     * Get columns.
     */
    protected function getColumns(): array
    {
        $columnClass = 'text-nowrap align-middle text-center';
        return [
            Column::computed('check')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
            Column::make('name')->addClass($columnClass),
            Column::make('sku')->title('SKU')->addClass($columnClass),
            Column::make('price')->addClass($columnClass),
            Column::make('discounted_price')->addClass($columnClass),
            Column::make('status')->addClass($columnClass),
            Column::make('updated_at')->addClass($columnClass),
            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
        ];
    }
}
