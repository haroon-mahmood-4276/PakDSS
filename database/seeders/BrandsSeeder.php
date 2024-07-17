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
            ],
            [
                'name' => 'Dell',
            ],
            [
                'name' => 'HP',
            ],
            [
                'name' => 'Intel',
            ],
            [
                'name' => 'Huawei',
            ],
            [
                'name' => 'Apple',
            ],
            [
                'name' => 'Nokia',
            ],
            [
                'name' => 'Brighto Paints',
            ],
            [
                'name' => 'Dalda',
            ],
            [
                'name' => 'Dawlance',
            ],
            [
                'name' => 'Omoré',
            ],
            [
                'name' => 'Pakola',
            ],
        ];

        foreach ($data as $key => $value) {
            $value['slug'] = Str::slug($value['name']);
            Brand::create($value);
        }
    }
}
