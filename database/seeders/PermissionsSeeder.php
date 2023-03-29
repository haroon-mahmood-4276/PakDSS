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

            // Roles Routes
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
                'name' => 'admin.roles.store',
                'guard_name' => 'admin',
                'show_name' => 'Can Store Role',
            ],
            [
                'name' => 'admin.roles.edit',
                'guard_name' => 'admin',
                'show_name' => 'Can Edit Role',
            ],
            [
                'name' => 'admin.roles.update',
                'guard_name' => 'admin',
                'show_name' => 'Can Update Role',
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

            // Permissions Routes
            [
                'name' => 'admin.permissions.index',
                'guard_name' => 'admin',
                'show_name' => 'Can View Permissions',
            ],
            [
                'name' => 'admin.permissions.view_all',
                'guard_name' => 'admin',
                'show_name' => 'Can View All Site Roles Permissions',
            ],
            // [
            //     'name' => 'admin.permissions.create',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Create Permissions',
            // ],
            // [
            //     'name' => 'admin.permissions.store',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Store Permissions',
            // ],
            // [
            //     'name' => 'admin.permissions.edit',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Edit Permissions',
            // ],
            // [
            //     'name' => 'admin.permissions.update',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Update Permissions',
            // ],
            // [
            //     'name' => 'admin.permissions.destroy',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Delete Permission',
            // ],
            // [
            //     'name' => 'admin.permissions.destroy',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Delete Selected Permissions',
            // ],
            [
                'name' => 'admin.permissions.assign-permission',
                'guard_name' => 'admin',
                'show_name' => 'Can Assign Permission',
            ],
            [
                'name' => 'admin.permissions.revoke-permission',
                'guard_name' => 'admin',
                'show_name' => 'Can Revoke Permission',
            ],
            [
                'name' => 'admin.permissions.edit-own-permission',
                'guard_name' => 'admin',
                'show_name' => 'Can Edit Own Permission',
            ],

            // Sites Routes
            [
                'name' => 'admin.cache.flush',
                'guard_name' => 'admin',
                'show_name' => 'Can Refresh Site Cache',
            ],

            // Commands Routes
            [
                'name' => 'admin.commands.command',
                'guard_name' => 'admin',
                'show_name' => 'Can Run Artisan Commands',
            ],

            // Payment Method Routes
            // [
            //     'name' => 'admin.payment-methods.index',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can View Payment Methods',
            // ],
            // [
            //     'name' => 'admin.payment-methods.create',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Create Payment Method',
            // ],
            // [
            //     'name' => 'admin.payment-methods.store',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Store Payment Method',
            // ],
            // [
            //     'name' => 'admin.payment-methods.edit',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Edit Payment Method',
            // ],
            // [
            //     'name' => 'admin.payment-methods.update',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Update Payment Method',
            // ],
            // [
            //     'name' => 'admin.payment-methods.destroy',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Delete Payment Method',
            // ],
            // [
            //     'name' => 'admin.payment-methods.export',
            //     'guard_name' => 'admin',
            //     'show_name' => 'Can Export Payment Methods',
            // ],
        ];

        $role = (new Role())->first();

        foreach ($data as $permission) {
            $permission = (new Permission())->create($permission)->assignRole($role);
        }
    }
}
