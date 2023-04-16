<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::truncate();
        $data = [
            [
                'name' => 'Shopx',
                'slug' => Str::of('Shopx')->slug(),
                'address' => 'Lahore, Pakistan',
                'lat' => '31.5864912',
                'long' => '74.3901942',
                'status' => 'active',
                'reason' => null,
            ],
        ];

        foreach ($data as $value) {
            (new Shop())->create($value);
        }
    }
}
