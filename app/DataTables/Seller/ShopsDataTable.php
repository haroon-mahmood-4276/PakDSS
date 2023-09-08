<?php

namespace App\DataTables\Seller;

use App\Models\Shop;
use App\Utils\Traits\DatatablesTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShopsDataTable extends DataTable
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
            ->addIndexColumn()
            // ->editColumn('check', function ($shop) {
            //     return $shop;
            // })
            ->editColumn('image', function ($model) {
                $imagePath = $model->getFirstMediaUrl('shops');
                return editImageColumn(image: strlen($imagePath) > 0 ? $imagePath : asset('admin-assets/img/do_not_delete/do_not_delete.png'), name: $model->name, width: 50);
            })
            ->editColumn('status', function ($shop) {
                return editStatusColumn($shop->status);
            })
            ->editColumn('updated_at', function ($shop) {
                return editDateColumn($shop->updated_at);
            })
            ->editColumn('actions', function ($shop) {
                return view('seller.shops.actions', ['shop' => $shop->id]);
            })
            ->setRowId('id')
            ->rawColumns($columns);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Shop $model): QueryBuilder
    {
        return $model->newQuery()->where('seller_id', auth()->guard('seller')->user()->id);
    }

    public function html(): HtmlBuilder
    {
        $buttons = [
            // Button::raw('add-new')
            //     ->addClass('btn btn-primary')
            //     ->text('<i class="icon material-icons md-add text-white "></i>Add New')
            //     ->attr([
            //         'onclick' => 'addNew()',
            //     ]),
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
            // Button::raw('delete-selected')
            //     ->addClass('btn btn-danger')
            //     ->text('<i class="icon material-icons md-delete"></i><span id="delete_selected_count" style="display:none">0</span> Delete Selected')
            //     ->attr([
            //         'onclick' => 'deleteSelected()',
            //     ]),
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
            // ->columnDefs([
            //     [
            //         'targets' => 0,
            //         'className' => 'text-center align-middle text-primary',
            //         'width' => '10%',
            //         'orderable' => false,
            //         'searchable' => false,
            //         'responsivePriority' => 3,
            //         'render' => "function (data, type, full, setting) {
            //             var role = JSON.parse(data);
            //             return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this, \'danger\')\" type=\"checkbox\" value=\"' + role.id + '\" name=\"checkForDelete[]\" id=\"checkForDelete_' + role.id + '\" /><label class=\"form-check-label\" for=\"chkRole_' + role.id + '\"></label></div>';
            //         }",
            //         'checkboxes' => [
            //             'selectAllRender' => '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
            //         ],
            //     ],
            // ])
            ->fixedColumns([
                'left' => 1,
                'right' => 1,
            ])
            ->orders([
                [2, 'asc'],
            ]);
    }

    /**
     * Get columns.
     */
    protected function getColumns(): array
    {
        return [
            // Column::computed('check')->exportable(false)->printable(false)->width(60)->addClass('text-nowrap align-middle text-center'),

            Column::computed('DT_RowIndex')->title('#')->addClass('text-nowrap align-middle text-center'),

            Column::computed('image')->addClass('text-nowrap align-middle text-center'),

            Column::make('name')->title('Name')->addClass('text-nowrap align-middle text-center'),
            Column::make('slug')->title('Slug')->addClass('text-nowrap align-middle text-center'),
            Column::make('address')->addClass('text-nowrap align-middle text-center'),

            Column::make('status')->width(100)->addClass('text-nowrap align-middle text-center'),

            Column::make('updated_at')->addClass('text-nowrap align-middle text-center'),

            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-nowrap align-middle text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'shops_' . date('YmdHis');
    }
}
