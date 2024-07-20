<?php

namespace App\DataTables\Seller;

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
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $columns = array_column($this->getColumns(), 'data');

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('image', function ($model) {
                $imagePath = $model->getFirstMediaUrl('shops');
                return editImageColumn(image: strlen($imagePath) > 0 ? $imagePath : asset('admin-assets/img/do_not_delete/do_not_delete.png'), name: $model->name, width: 50);
            })
            ->editColumn('status', fn ($shop) => editStatusColumn($shop->status->value))
            ->editColumn('updated_at', fn ($shop) => editDateTimeColumn($shop->updated_at))
            ->editColumn('actions', fn ($shop) => view('seller.shops.actions', ['shop' => $shop->id]))
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
        $columnClass = 'text-nowrap align-middle text-center';
        return [
            Column::computed('DT_RowIndex')->title('#')->addClass($columnClass),

            Column::computed('image')->addClass($columnClass),

            Column::make('name')->title('Name')->addClass($columnClass),
            Column::make('slug')->title('Slug')->addClass($columnClass),
            Column::make('address')->addClass($columnClass),

            Column::make('status')->width(100)->addClass($columnClass),

            Column::make('updated_at')->addClass($columnClass),

            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
        ];
    }
}
