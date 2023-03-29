<?php

namespace Database\Seeders;

use App\Models\{Admin, Role};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRole = (new Role())->where('guard_name', 'admin')->first();

        $data = [
            [
                'name' => 'Haroon Mahmood',
                'email' => 'haroon@pakdss.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => now()->timestamp,
            ],
        ];

        foreach ($data as $key => $admin) {
            $admin = (new Admin())->create($admin);
            $admin->assignRole($adminRole);
        }
    }
}
