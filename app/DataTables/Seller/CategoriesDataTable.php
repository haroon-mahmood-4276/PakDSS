<?php

namespace App\DataTables\Seller;

use App\Models\Category;
use App\Utils\Traits\DatatablesTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
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
            ->editColumn('parent_id', function ($category) {
                return Str::of(getParentByParentId($category->parent_id, Category::class))->ucfirst();
            })
            ->editColumn('linked_brands_count', function ($brand) {
                return $brand->brands_count > 0 ? $brand->brands_count : '-';
            })
            ->editColumn('created_at', function ($category) {
                return editDateColumn($category->created_at);
            })
            ->editColumn('updated_at', function ($category) {
                return editDateColumn($category->updated_at);
            })
            ->setRowId('id')
            ->rawColumns($columns);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery()->withCount('brands');
    }

    public function html(): HtmlBuilder
    {
        $buttons = [
            Button::make('export')
                ->addClass('btn btn-primary dropdown-toggle')
                ->text('<i class="icon material-icons md-cloud_download text-white "></i>&nbsp;&nbsp;Export')
                ->buttons([
                    Button::make('print')->addClass('dropdown-item')->text('<i class="icon material-icons md-local_printshop"></i>&nbsp;&nbsp;Print'),
                    Button::make('copy')->addClass('dropdown-item')->text('<i class="icon material-icons md-content_copy"></i>&nbsp;&nbsp;Copy'),
                    Button::make('csv')->addClass('dropdown-item')->text('<i class="icon material-icons md-picture_as_pdf"></i>&nbsp;&nbsp;CSV'),
                    Button::make('excel')->addClass('dropdown-item')->text('<i class="icon material-icons md-picture_as_pdf"></i>&nbsp;&nbsp;Excel'),
                    Button::make('pdf')->addClass('dropdown-item')->text('<i class="icon material-icons md-picture_as_pdf"></i>&nbsp;&nbsp;PDF'),
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
            ->pagingType('full_numbers')
            ->lengthMenu([
                [30, 50, 70, 100, 120, 150, -1],
                [30, 50, 70, 100, 120, 150, 'All'],
            ])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>> <"d-flex justify-content-between align-items-center my-3 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>> t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->orders([
                [1, 'asc'],
            ]);

    }

    /**
     * Get columns.
     */
    protected function getColumns(): array
    {
        return [
            Column::make('name')->title('Name')->addClass('text-nowrap align-middle text-center'),
            Column::make('slug')->title('Slug')->addClass('text-nowrap align-middle text-center'),
            Column::make('parent_id')->title('Parent')->addClass('text-nowrap align-middle text-center'),
            Column::computed('linked_brands_count')->title('Associated Brands')->addClass('text-nowrap align-middle text-center'),
            Column::make('created_at')->addClass('text-nowrap align-middle text-center'),
            Column::make('updated_at')->addClass('text-nowrap align-middle text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'Categories_'.date('YmdHis');
    }
}
