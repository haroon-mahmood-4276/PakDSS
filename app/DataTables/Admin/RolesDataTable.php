<?php

namespace App\DataTables\Admin;

use App\Models\Role;
use App\Utils\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RolesDataTable extends DataTable
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

        return (new EloquentDataTable($query))
            ->editColumn('check', fn ($role) => $role)
            ->editColumn('parent_id', fn ($role) => Str::of($role->parent?->name ?? 'parent')->ucfirst())
            ->editColumn('created_at', fn ($role) => editDateTimeColumn($role->created_at))
            ->editColumn('actions', fn ($role) => $role->name != 'Admin' ? view('admin.roles.actions', ['id' => $role->id]) : null)
            ->setRowId('id')
            ->rawColumns($columns);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Role $model): QueryBuilder
    {
        return $model->newQuery()->with('parent');
    }

    public function html(): HtmlBuilder
    {
        $buttons = [];

        if (auth()->user()->can('admin.roles.export')) {
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

        if (auth()->user()->can('admin.roles.destroy')) {
            $buttons[] = Button::raw('delete-selected')
                ->addClass('btn btn-danger waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-minus"></i>&nbsp;&nbsp;<span id="delete_selected_count" style="display:none">0</span> Delete Selected')
                ->attr([
                    'onclick' => 'deleteSelected()',
                ]);
        }

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
                        if(role.name != 'Admin') {
                            return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this, \"danger\")\" type=\"checkbox\" value=\"' + role.id + '\" name=\"checkForDelete[]\" id=\"checkForDelete_' + role.id + '\" /><label class=\"form-check-label\" for=\"chkRole_' + role.id + '\"></label></div>';
                        }
                        return null;
                    }",
                    'checkboxes' => [
                        'selectAllRender' => '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
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
        $checkColumn = Column::computed('check')->exportable(false)->printable(false)->width(60)->addClass($columnClass);
        if (auth()->user()->can('admin.roles.destroy')) {
            $checkColumn->addClass('disabled');
        }

        return [
            $checkColumn,
            Column::make('name')->title('Role Name')->addClass($columnClass),
            Column::make('parent_id')->title('Parent')->addClass($columnClass),
            Column::make('created_at')->addClass($columnClass),
            Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass($columnClass),
        ];
    }
}
