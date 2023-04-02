<?php

namespace Database\Seeders;

use App\Models\{Permission, Role};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
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
                'show_name' => 'Can View Roles',
            ],
            [
                'name' => 'admin.roles.create',
                'guard_name' => 'admin',
                'show_name' => 'Can Create Role',
            ],
            [
                'name' => 'admin.roles.edit',
                'guard_name' => 'admin',
                'show_name' => 'Can Edit Role',
            ],
            [
                'name' => 'admin.roles.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Can Delete Role',
            ],
            [
                'name' => 'admin.roles.export',
                'guard_name' => 'admin',
                'show_name' => 'Can Export Roles',
            ],

            // Permissions Permissions
            [
                'name' => 'admin.permissions.index',
                'guard_name' => 'admin',
                'show_name' => 'Can View Permissions',
            ],
            [
                'name' => 'admin.permissions.assign-permission',
                'guard_name' => 'admin',
                'show_name' => 'Can Assign Permission',
            ],

            // Categories Permissions
            [
                'name' => 'admin.categories.index',
                'guard_name' => 'admin',
                'show_name' => 'Can View Categories',
            ],
            [
                'name' => 'admin.categories.create',
                'guard_name' => 'admin',
                'show_name' => 'Can Create Category',
            ],
            [
                'name' => 'admin.categories.edit',
                'guard_name' => 'admin',
                'show_name' => 'Can Edit Category',
            ],
            [
                'name' => 'admin.categories.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Can Delete Category',
            ],
            [
                'name' => 'admin.categories.export',
                'guard_name' => 'admin',
                'show_name' => 'Can Export Categories',
            ],

            // Tags Permissions
            [
                'name' => 'admin.tags.index',
                'guard_name' => 'admin',
                'show_name' => 'Can View Tags',
            ],
            [
                'name' => 'admin.tags.create',
                'guard_name' => 'admin',
                'show_name' => 'Can Create Tag',
            ],
            [
                'name' => 'admin.tags.edit',
                'guard_name' => 'admin',
                'show_name' => 'Can Edit Tag',
            ],
            [
                'name' => 'admin.tags.destroy',
                'guard_name' => 'admin',
                'show_name' => 'Can Delete Tag',
            ],
            [
                'name' => 'admin.tags.export',
                'guard_name' => 'admin',
                'show_name' => 'Can Export Tags',
            ],
        ];

        $role = (new Role())->first();

        foreach ($data as $permission) {
            $permission = (new Permission())->create($permission)->assignRole($role);
        }
    }
}
