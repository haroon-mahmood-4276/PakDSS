<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            AdminsSeeder::class,
            SellersSeeder::class,
            UsersSeeder::class,
            CategoriesSeeder::class,
            TagsSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
