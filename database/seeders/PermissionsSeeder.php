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
        ];

        $role = (new Role())->first();

        foreach ($data as $permission) {
            $permission = (new Permission())->create($permission)->assignRole($role);
        }
    }
}
