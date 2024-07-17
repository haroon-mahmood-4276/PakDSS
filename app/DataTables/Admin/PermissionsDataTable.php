<?php

namespace App\DataTables\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Utils\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PermissionsDataTable extends DataTable
{
    use DataTableTrait;

    public function dataTable(QueryBuilder $query)
    {
        $columns = array_column($this->getColumns(), 'data');

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('roles', function ($permission) {
                return [
                    'permission_id' => $permission->id,
                    'roles' => $permission->roles->pluck('id')->toArray(),
                ];
            })
            ->editColumn('created_at', function ($permission) {
                return editDateColumn($permission->created_at);
            })
            ->editColumn('updated_at', function ($permission) {
                return editDateColumn($permission->updated_at);
            })
            ->setRowId('id')
            ->rawColumns($columns);
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \Spatie\Permission\Models\Permission  $model
     */
    public function query(Permission $model): QueryBuilder
    {
        return $model->newQuery()->with('roles');
    }

    public function html(): HtmlBuilder
    {
        $buttons = [];

        if (auth()->user()->can('admin.permissions.export')) {
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

        if (auth()->user()->can('admin.permissions.destroy')) {
            $buttons[] = Button::raw('delete-selected')
                ->addClass('btn btn-danger waves-effect waves-float waves-light m-1')
                ->text('<i class="fa-solid fa-minus"></i>&nbsp;&nbsp;<span id="delete_selected_count" style="display:none">0</span> Delete Selected')
                ->attr([
                    'onclick' => 'deleteSelected()',
                ]);
        }

        return $this->builder()
            ->setTableId('permissions-table')
            ->addTableClass('table-borderless table-striped table-hover class-datatable-for-event')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->stateSave()
            ->serverSide()
            ->processing()
            ->deferRender()
            ->pagingType('full_numbers')
            ->lengthMenu([
                [30, 50, 70, 100, 120, 150, -1],
                [30, 50, 70, 100, 120, 150, 'All'],
            ])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"d-flex justify-content-between mx-0 pb-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->buttons($buttons)
            // ->rowGroupDataSrc('class')
            ->scrollX()
            ->fixedColumns([
                'left' => 2,
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
        $currentAuthRoles = auth()->user()->roles;
        $roles = getLinkedTreeData(new Role(), $currentAuthRoles->pluck('id'));
        // $roles = array_merge($currentAuthRoles->toArray(), $roles); // Add current role to the list
        unset($roles[0]['pivot']);

        $colArray = [
            Column::computed('DT_RowIndex')->title('#'),
            Column::make('show_name')->title('Permission Name')->addClass('text-nowrap')->ucfirst(),
        ];

        foreach ($roles as $role) {

            $colArray[] = Column::computed('roles')
                ->title($role['name'])
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->render('function () {
                    var roles = data.roles;
                    var isPermissionAssigned = roles.includes("' . $role['id'] . '");
                    var checkbox = "<div class=\'form-check d-flex justify-content-center\'>";

                    if(isPermissionAssigned) {
                        checkbox += "<input class=\'form-check-input\' type=\'checkbox\' onchange=\'changeRolePermission(\"' . $role['id'] . '\", \"" + data.permission_id + "\")\'  id=\'chkRolePermission_' . $role['id'] . '__' . '" + data.permission_id + "\' checked />";
                    } else {
                        checkbox += "<input class=\'form-check-input\' type=\'checkbox\' onchange=\'changeRolePermission(\"' . $role['id'] . '\", \"" + data.permission_id + "\")\'  id=\'chkRolePermission_' . $role['id'] . '__' . '" + data.permission_id + "\' />";
                    }
                    checkbox += "<label class=\'form-check-label\' for=\'chkRolePermission_' . $role['id'] . '__' . '" + data.permission_id + "\'></label></div>";
                    return checkbox;
                }');
        }
        return $colArray;
    }
}
