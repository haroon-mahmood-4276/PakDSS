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

        $tags = Tag::all();
        $categories = Category::inRandomOrder()->limit(5)->get()->pluck('id')->toArray();

        $brand = Brand::first()->id;
        $seller = Seller::first()->id;
        $shop = Shop::first()->id;

        $data = [
            [
                'brand_id' => $brand,
                'seller_id' => $seller,
                'shop_id' => $shop,

                'name' => 'Mouse',

                'permalink' => Str::of('Mouse')->slug(),
                'sku' => 'SHX-1',
                'price' => 123,
                'discounted_price' => 123,
                'call_for_final_rates' => false,
                'are_rates_printed_on_package' => false,

                'length' => 0,
                'width' => 0,
                'height' => 0,

                'weight' => 0,

                'short_description' => Str::markdown('# Mouse'),
                'long_description' => Str::markdown('# Mouse'),

                'meta_aurthor' => '',
                'meta_keywords' => '[{"value":"Quae aute sunt dolo"}]',
                'meta_description' => '',

                'status' => 'pending_approval',
                'reason' => null,
            ],
            [
                'brand_id' => $brand,
                'seller_id' => $seller,
                'shop_id' => $shop,

                'name' => 'Mouse1',

                'permalink' => Str::of('Mouse1')->slug(),
                'sku' => 'SHX-2',
                'price' => 123,
                'discounted_price' => 123,
                'call_for_final_rates' => false,
                'are_rates_printed_on_package' => false,

                'length' => 0,
                'width' => 0,
                'height' => 0,

                'short_description' => Str::markdown('# Mouse'),
                'long_description' => Str::markdown('# Mouse'),

                'meta_aurthor' => '',
                'meta_keywords' => '[{"value":"Quae aute sunt dolo"}]',
                'meta_description' => '',

                'status' => 'pending_approval',
                'reason' => null,
            ],
            [
                'brand_id' => $brand,
                'seller_id' => $seller,
                'shop_id' => $shop,

                'name' => 'Mouse2',

                'permalink' => Str::of('Mouse2')->slug(),
                'sku' => 'SHX-3',
                'price' => 123,
                'discounted_price' => 0,
                'call_for_final_rates' => false,
                'are_rates_printed_on_package' => false,

                'length' => 0,
                'width' => 0,
                'height' => 0,

                'short_description' => Str::markdown('# Mouse'),
                'long_description' => Str::markdown('# Mouse'),

                'meta_aurthor' => '',
                'meta_keywords' => '[{"value":"Quae aute sunt dolo"}]',
                'meta_description' => '',

                'status' => 'pending_approval',
                'reason' => null,
            ],
        ];

        foreach ($data as $value) {
            $product = Product::create($value);
            $product->categories()->sync($categories);
            $product->tags()->sync($tags);
        }
    }
}
