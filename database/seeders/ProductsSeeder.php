<?php

namespace Database\Seeders;

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

        $data = [
            [
                'seller_id' => Seller::first()->id,
                'shop_id' => Shop::first()->id,

                'name' => 'Mouse',

                'permalink' => Str::of('Mouse')->slug(),
                'sku' => 'SHX-1',
                'price' => 123,

                'short_description' => 'Mouse',
                'long_description' => 'Mouse',

                'keywords' => ['mouse', 'gaming'],

                'meta_aurthor' => '',
                'meta_keywords' => '',
                'meta_description' => '',

                'status' => 'active',
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
