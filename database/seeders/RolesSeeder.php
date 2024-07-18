<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        $adminRole = (new Role())->create([
            'name' => 'Admin',
            'guard_name' => 'admin',
            'parent_id' => null,
        ]);

        $data = [
            [
                'name' => 'Admin Manager',
                'guard_name' => 'admin',
                'parent_id' => $adminRole->id,
            ],
            [
                'name' => 'Seller Manager',
                'guard_name' => 'admin',
                'parent_id' => $adminRole->id,
            ],
            [
                'name' => 'Brand/Category Manager',
                'guard_name' => 'admin',
                'parent_id' => $adminRole->id,
            ],
        ];

        foreach ($data as $value) {
            (new Role())->create($value);
        }
    }
}
