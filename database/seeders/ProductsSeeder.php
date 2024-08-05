<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Shop;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        if (app()->environment() === 'local') {
            $tags = Tag::all();

            $seller = Seller::first()->id;
            $shop = Shop::first()->id;

            $data = [
                [
                    'brand_id' => Brand::inRandomOrder(1)->first()->id,
                    'seller_id' => $seller,
                    'shop_id' => $shop,

                    'name' => 'Mouse',

                    'permalink' => Str::of('Mouse')->slug(),
                    'model_no' => 'SHX',
                    'price' => rand(10, 1000),
                    'discounted_price' => rand(10, 100),
                    'call_for_final_rates' => false,
                    'are_rates_printed_on_package' => false,

                    'length' => 0,
                    'width' => 0,
                    'height' => 0,

                    'weight' => 0,

                    'short_description' => Str::markdown('# Mouse'),
                    'long_description' => Str::markdown('# Mouse'),

                    'meta_author' => '',
                    'meta_keywords' => '[{"value":"Quae aute sunt dolo"}]',
                    'meta_description' => '',

                    'status' => 'active',
                    'reason' => null,
                ]
            ];

            for ($i = 0; $i < 100; $i++) {
                foreach ($data as $value) {
                    $value['brand_id'] = Brand::inRandomOrder(1)->first()->id;
                    $value['name'] .= '-' . $i;
                    $value['permalink']  .= '-' . $i;
                    $value['model_no']  .= '-' . $i;
                    $product = Product::create($value);
                    $product->categories()->sync(Category::inRandomOrder()->limit(5)->pluck('id')->toArray());
                    $product->tags()->sync($tags);
                }
            }
        }
    }
}
