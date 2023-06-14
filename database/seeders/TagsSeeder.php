<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        $data = [
            [
                'name' => Str::slug('Food'),
            ],
            [
                'name' => Str::slug('Blog'),
            ],
            [
                'name' => Str::slug('Electronics'),
            ],
        ];

        foreach ($data as $key => $value) {
            Tag::create($value);
        }
    }
}
