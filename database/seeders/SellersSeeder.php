<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'name' => 'Haroon Mahmood',
                'email' => 'haroon@pakdss.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => now()->timestamp,
            ],
        ];

        foreach ($data as $value) {
            (new Seller())->create($value);
        }
    }
}
