<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder
{
    use WithoutModelEvents;
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
                'name' => 'No Brand',
                'is_default' => true
            ],
            [
                'name' => 'Dell',
                'is_default' => false
            ],
            [
                'name' => 'HP',
                'is_default' => false
            ],
            [
                'name' => 'Intel',
                'is_default' => false
            ],
            [
                'name' => 'Huawei',
                'is_default' => false
            ],
            [
                'name' => 'Apple',
                'is_default' => false
            ],
            [
                'name' => 'Nokia',
                'is_default' => false
            ],
            [
                'name' => 'Brighto Paints',
                'is_default' => false
            ],
            [
                'name' => 'Dalda',
                'is_default' => false
            ],
            [
                'name' => 'Dawlance',
                'is_default' => false
            ],
            [
                'name' => 'Omoré',
                'is_default' => false
            ],
            [
                'name' => 'Pakola',
                'is_default' => false
            ],
        ];

        foreach ($data as $value) {
            $value['slug'] = Str::slug($value['name']);
            Brand::create($value);
        }
    }
}
