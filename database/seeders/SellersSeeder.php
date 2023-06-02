<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::truncate();
        $data = [
            [
                'first_name' => 'Haroon',
                'middle_name' => null,
                'last_name' => 'Mahmood',
                'email' => 'haroon@pakdss.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => now()->timestamp,
                'cnic' => '0000000000000',
                'ntn_number' => '000001',
                'phone_primary' => '03000000000',
                'phone_secondary' => null,
                'status' => 'active',
                'reason' => null,
                'setup' => true,
            ],
        ];

        foreach ($data as $value) {
            (new Seller())->create($value);
        }
    }
}
