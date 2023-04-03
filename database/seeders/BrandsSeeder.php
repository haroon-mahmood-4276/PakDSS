<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        $data = [
            [
                'name' => 'Dell',
                'slug' => Str::slug('Dell'),
            ],
            [
                'name' => 'HP',
                'slug' => Str::slug('HP'),
            ],
            [
                'name' => 'Intel',
                'slug' => Str::slug('Intel'),
            ],
            [
                'name' => 'Huawei',
                'slug' => Str::slug('Huawei'),
            ],
            [
                'name' => 'Apple',
                'slug' => Str::slug('Apple'),
            ],
            [
                'name' => 'Nokia',
                'slug' => Str::slug('Nokia'),
            ],
            [
                'name' => 'Brighto Paints',
                'slug' => Str::slug('Brighto Paints'),
            ],
            [
                'name' => 'Dalda',
                'slug' => Str::slug('Dalda'),
            ],
            [
                'name' => 'Dawlance',
                'slug' => Str::slug('Dawlance'),
            ],
            [
                'name' => 'Omoré',
                'slug' => Str::slug('Omoré'),
            ],
            [
                'name' => 'Pakola',
                'slug' => Str::slug('Pakola'),
            ],
        ];

        foreach ($data as $key => $value) {
            Brand::create($value);
        }
    }
}
