<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::truncate();

        $seller = Seller::first();

        $data = [
            [
                'name' => 'Shopx',
                'slug' => Str::of('Shopx')->slug(),

                'email' => 'admin@shopx.com',

                'phone_1' => '923031111111',
                'phone_2' => '923031111111',

                'address' => 'Lahore, Pakistan',
                'pickup_address' => 'Lahore, Pakistan',
                'description' => 'Ecommerce Store',

                'manager_name' => 'Mubeen',
                'manager_mobile' => '923031111111',
                'manager_email' => 'admin@shopx.com',

                'lat' => '31.5864912',
                'long' => '74.3901942',

                'status' => 'pending_approval',
                'reason' => null,
            ],
            [
                'name' => 'Shopx1',
                'slug' => Str::of('Shopx1')->slug(),

                'email' => 'admin@shopx1.com',

                'phone_1' => '923031111112',
                'phone_2' => '923031111112',

                'address' => 'Lahore, Pakistan',
                'pickup_address' => 'Lahore, Pakistan',
                'description' => 'Ecommerce Store',

                'manager_name' => 'Mubeen',
                'manager_mobile' => '923031111112',
                'manager_email' => 'admin@shopx2.com',

                'lat' => '31.5864912',
                'long' => '74.3901942',

                'status' => 'pending_approval',
                'reason' => null,
            ],
            [
                'name' => 'Shopx3',
                'slug' => Str::of('Shopx3')->slug(),

                'email' => 'admin@shopx3.com',

                'phone_1' => '923031111113',
                'phone_2' => '923031111113',

                'address' => 'Lahore, Pakistan',
                'pickup_address' => 'Lahore, Pakistan',
                'description' => 'Ecommerce Store',

                'manager_name' => 'Mubeen',
                'manager_mobile' => '923031111113',
                'manager_email' => 'admin@shopx3.com',

                'lat' => '31.5864912',
                'long' => '74.3901942',

                'status' => 'pending_approval',
                'reason' => null,
            ],
        ];

        foreach ($data as $value) {
            $seller->shops()->create($value);
        }
    }
}
