<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
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
                'name' => 'Admin1',
                'guard_name' => 'admin',
                'parent_id' => $AdminRole->id,
            ],
        ];

        foreach ($data as $key => $value) {
            (new Role())->create($value);
        }
    }
}
