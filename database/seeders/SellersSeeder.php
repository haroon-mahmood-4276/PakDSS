<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellersSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::truncate();
        if (app()->environment() === 'local') {
            $data = [
                [
                    'first_name' => 'Haroon',
                    'middle_name' => null,
                    'last_name' => 'Mahmood',
                    'email' => 'haroon@pakdss.com',
                    'password' => Hash::make('IyeTech@4276'),
                    'email_verified_at' => now()->timestamp,
                    'cnic' => '1234567890123',
                    'ntn_number' => '929384',
                    'phone_primary' => '03123456789',
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
}
