<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        ( new Tag() )->insert( [
            [
                'id' => 1,
                'name' => 'Food',
                'slug' => Str::slug( 'Food' ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Blog',
                'slug' => Str::slug( 'Blog' ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Electronics',
                'slug' => Str::slug( 'Electronics' ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ] );
    }
}
