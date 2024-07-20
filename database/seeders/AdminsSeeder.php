<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    use WithoutModelEvents;
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
                'password' => Hash::make('IyeTech@4276'),
                'email_verified_at' => now()->timestamp,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@pakdss.com',
                'password' => Hash::make('IyeTech@2299'),
                'email_verified_at' => now()->timestamp,
            ],
        ];

        foreach ($data as $admin) {
            $admin = (new Admin())->create($admin);
            $admin->assignRole($adminRole);
        }
    }
}
