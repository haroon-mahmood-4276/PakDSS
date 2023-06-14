<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();
        $data = [

            // Roles Permissions
            [
                'name' => 'admin.roles.index',
                'guard_name' => 'admin',
                'show_name' => 'Roles - Can View',
            ],
            [
                'name' => 'admin.roles.create',
                'guard_name' => 'admin',
                'show_name' => 'Roles - Can Create',
            ],
            [
                'name' => 'admin.roles.edit',
                'guard_name' => 'admin',
                'show_name' => 'Roles - Can Edit',
            ],
            [
                'name' => 'admin.roles.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Roles - Can Delete',
            ],
            [
                'name' => 'admin.roles.export',
                'guard_name' => 'admin',
                'show_name' => 'Roles - Can Export',
            ],

            // Permissions Permissions
            [
                'name' => 'admin.permissions.index',
                'guard_name' => 'admin',
                'show_name' => 'Permissions - Can View',
            ],
            [
                'name' => 'admin.permissions.assign-permission',
                'guard_name' => 'admin',
                'show_name' => 'Permissions - Can Assign',
            ],

            // Categories Permissions
            [
                'name' => 'admin.categories.index',
                'guard_name' => 'admin',
                'show_name' => 'Categories - Can View',
            ],
            [
                'name' => 'admin.categories.create',
                'guard_name' => 'admin',
                'show_name' => 'Categories - Can Create',
            ],
            [
                'name' => 'admin.categories.edit',
                'guard_name' => 'admin',
                'show_name' => 'Categories - Can Edit',
            ],
            [
                'name' => 'admin.categories.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Categories - Can Delete',
            ],
            [
                'name' => 'admin.categories.export',
                'guard_name' => 'admin',
                'show_name' => 'Categories - Can Export',
            ],

            // Tags Permissions
            [
                'name' => 'admin.tags.index',
                'guard_name' => 'admin',
                'show_name' => 'Tags - Can View',
            ],
            [
                'name' => 'admin.tags.create',
                'guard_name' => 'admin',
                'show_name' => 'Tags - Can Create',
            ],
            [
                'name' => 'admin.tags.edit',
                'guard_name' => 'admin',
                'show_name' => 'Tags - Can Edit',
            ],
            [
                'name' => 'admin.tags.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Tags - Can Delete',
            ],
            [
                'name' => 'admin.tags.export',
                'guard_name' => 'admin',
                'show_name' => 'Tags - Can Export',
            ],

            // Brands Permissions
            [
                'name' => 'admin.brands.index',
                'guard_name' => 'admin',
                'show_name' => 'Brands - Can View',
            ],
            [
                'name' => 'admin.brands.create',
                'guard_name' => 'admin',
                'show_name' => 'Brands - Can Create',
            ],
            [
                'name' => 'admin.brands.edit',
                'guard_name' => 'admin',
                'show_name' => 'Brands - Can Edit',
            ],
            [
                'name' => 'admin.brands.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Brands - Can Delete',
            ],
            [
                'name' => 'admin.brands.export',
                'guard_name' => 'admin',
                'show_name' => 'Brands - Can Export',
            ],

            // Sellers Permissions
            [
                'name' => 'admin.sellers.index',
                'guard_name' => 'admin',
                'show_name' => 'Sellers - Can View',
            ],
            [
                'name' => 'admin.sellers.create',
                'guard_name' => 'admin',
                'show_name' => 'Sellers - Can Create',
            ],
            [
                'name' => 'admin.sellers.edit',
                'guard_name' => 'admin',
                'show_name' => 'Sellers - Can Edit',
            ],
            [
                'name' => 'admin.sellers.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Sellers - Can Delete',
            ],
            [
                'name' => 'admin.sellers.export',
                'guard_name' => 'admin',
                'show_name' => 'Sellers - Can Export',
            ],

            // Users Permissions
            [
                'name' => 'admin.users.index',
                'guard_name' => 'admin',
                'show_name' => 'Users - Can View',
            ],
            [
                'name' => 'admin.users.create',
                'guard_name' => 'admin',
                'show_name' => 'Users - Can Create',
            ],
            [
                'name' => 'admin.users.edit',
                'guard_name' => 'admin',
                'show_name' => 'Users - Can Edit',
            ],
            [
                'name' => 'admin.users.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Users - Can Delete',
            ],
            [
                'name' => 'admin.users.export',
                'guard_name' => 'admin',
                'show_name' => 'Users - Can Export',
            ],

            // Admin Approval Permissions
            [
                'name' => 'admin.approvals.shops.index',
                'guard_name' => 'admin',
                'show_name' => 'Approvals - Shops - Can View',
            ],
            [
                'name' => 'admin.approvals.products.index',
                'guard_name' => 'admin',
                'show_name' => 'Approvals - Products - Can View',
            ],

            // Site Permissions
            [
                'name' => 'admin.settings.sites.index',
                'guard_name' => 'admin',
                'show_name' => 'Settings - Site - Can View',
            ],
        ];

        $role = (new Role())->first();
        $role->syncPermissions([]);

        foreach ($data as $permission) {
            $permission = (new Permission())->create($permission)->assignRole($role);
        }
    }
}
