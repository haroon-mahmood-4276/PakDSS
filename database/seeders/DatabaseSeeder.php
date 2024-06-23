<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingsSeeder::class,
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
            CountryStateCitySeeder::class
        ]);
    }
}
