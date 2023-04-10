<?php

namespace App\DataTables\Seller;

use App\Models\Category;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CategoriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query)
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
            ->rawColumns(array_merge($columns, ['action', 'check']));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery()->withCount('brands');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('categories-table')
            ->addTableClass('table-borderless table-striped table-hover')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()
            ->dom('BlfrtipC')
            ->scrollX()
            ->lengthMenu([
                [30, 50, 70, 100, 120, 150, -1],
                [30, 50, 70, 100, 120, 150, "All"],
            ])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->orders([
                [2, 'desc'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        $columns = [
            Column::make('name')->title('Name')->addClass('text-nowrap text-center'),
            Column::make('slug')->title('Slug'),
            Column::make('parent_id')->title('Parent')->addClass('text-nowrap text-center'),
            Column::computed('linked_brands_count')->title('Associated Brands')->addClass('text-nowrap text-center'),
            Column::make('created_at')->addClass('text-nowrap text-center'),
            Column::make('updated_at')->addClass('text-nowrap text-center'),
        ];
        return $columns;
    }
}
