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
            SettingsSiteSeeder::class,
            RolesSeeder::class,
            PermissionsSeeder::class,
            AdminsSeeder::class,
            SellersSeeder::class,
            ShopsSeeder::class,
            UsersSeeder::class,
            CategoriesSeeder::class,
            BrandsSeeder::class,
            TagsSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
