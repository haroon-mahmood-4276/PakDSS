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
        $AdminRole = (new Role())->create([
            'name' => 'Admin',
            'guard_name' => 'admin',
            'parent_id' => null,
        ]);

        $data = [
            [
                'name' => 'Admin Manager',
                'guard_name' => 'admin',
                'parent_id' => $AdminRole->id,
            ],
            [
                'name' => 'Seller Manager',
                'guard_name' => 'admin',
                'parent_id' => $AdminRole->id,
            ],
            [
                'name' => 'Brand/Category Manager',
                'guard_name' => 'admin',
                'parent_id' => $AdminRole->id,
            ],
        ];

        foreach ($data as $key => $value) {
            (new Role())->create($value);
        }
    }
}
