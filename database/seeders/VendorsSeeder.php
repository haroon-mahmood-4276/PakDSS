<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Haroon Mahmood',
                'email' => 'haroon@pakdss.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => now()->timestamp,
            ],
        ];

        foreach ($data as $value) {
            (new Vendor())->create($value);
        }
    }
}
