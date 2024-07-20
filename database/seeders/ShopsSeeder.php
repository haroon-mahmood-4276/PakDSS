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

        $logoPath = public_path('admin-assets/img/do_not_delete/do_not_delete.png');

        if (app()->environment() === 'local') {
            $seller = Seller::first();

            $data = [
                [
                    'name' => 'Games And Tech',

                    'email' => 'info@gamesandtech.com',

                    'phone_1' => '03123456789',
                    'phone_2' => '03123456789',

                    'address' => 'Lahore, Pakistan',
                    'pickup_address' => 'Lahore, Pakistan',
                    'description' => 'Gaming Shop',

                    'manager_name' => 'Haroon',
                    'manager_mobile' => '03123456789',
                    'manager_email' => 'haroon@gamesandtech.com',

                    'lat' => '31.5864912',
                    'long' => '74.3901942',

                    'status' => 'active',
                    'reason' => null,
                ],
            ];

            foreach ($data as $value) {
                $value['slug'] = Str::slug($value['name']);
                $shop = $seller->shops()->create($value);
                $shop->addMedia($logoPath)->preservingOriginal()->toMediaCollection('shops');
            }
        }
    }
}
