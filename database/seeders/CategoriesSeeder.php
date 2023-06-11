<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $data = [
            [
                'name' => 'Men',
                'slug' => Str::slug('Men'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Men Clothing',
                        'slug' => Str::slug('Men Clothing'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Traditional Clothing',
                                'slug' => Str::slug('Men Traditional Clothing'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Winter Colothing',
                                'slug' => Str::slug('Men Winter Colothing'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Innerwear / Sleepwear',
                                'slug' => Str::slug('Men Innerwear / Sleepwear'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Men Shoes',
                        'slug' => Str::slug('Men Shoes'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Sandals / Slippers',
                                'slug' => Str::slug('Men Sandals / Slippers'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Formal Shoes',
                                'slug' => Str::slug('Men Formal Shoes'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Casual Shoes',
                                'slug' => Str::slug('Men Casual Shoes'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Sneakers',
                                'slug' => Str::slug('Men Sneakers'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Boots',
                                'slug' => Str::slug('Men Boots'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Shoe Care',
                                'slug' => Str::slug('Men Shoe Care'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Sports Shoes',
                                'slug' => Str::slug('Men Sports Shoes'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Men Watchs',
                        'slug' => Str::slug('Men Watchs'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Smart Watches',
                                'slug' => Str::slug('Men Smart Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Digital Watches',
                                'slug' => Str::slug('Men Digital Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Chronographic Watches',
                                'slug' => Str::slug('Men Chronographic Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Analog / Historical Watches',
                                'slug' => Str::slug('Men Analog / Historical Watches'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Men Accessories',
                        'slug' => Str::slug('Men Accessories'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Belts / Bags / Purses',
                                'slug' => Str::slug('Men Belts / Bags / Purses'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Caps / Gloves / Hats',
                                'slug' => Str::slug('Men Caps / Gloves / Hats'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Wallets / Cardholders',
                                'slug' => Str::slug('Men Wallets / Cardholders'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Jewellery',
                                'slug' => Str::slug('Men Jewellery'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Sunglasses',
                                'slug' => Str::slug('Men Sunglasses'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Women',
                'slug' => Str::slug('Women'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Women Islamic Clothes',
                        'slug' => Str::slug('Women Islamic Clothes'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Scarfs',
                                'slug' => Str::slug('Women Scarfs'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Abayas',
                                'slug' => Str::slug('Women Abayas'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Clothing',
                        'slug' => Str::slug('Women Clothing'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Traditional Clothing',
                                'slug' => Str::slug('Women Traditional Clothing'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Winter Colothing',
                                'slug' => Str::slug('Women Winter Colothing'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Innerwear / Sleepwear',
                                'slug' => Str::slug('Women Innerwear / Sleepwear'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Shawls',
                                'slug' => Str::slug('Women Shawls'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Shoes',
                        'slug' => Str::slug('Women Shoes'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Heels',
                                'slug' => Str::slug('Women Heels'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Flats / Sandals',
                                'slug' => Str::slug('Women Flats / Sandals'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Sports Shoes',
                                'slug' => Str::slug('Women Sports Shoes'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Boots',
                                'slug' => Str::slug('Women Boots'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Watchs',
                        'slug' => Str::slug('Women Watchs'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Smart Watches',
                                'slug' => Str::slug('Women Smart Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Digital Watches',
                                'slug' => Str::slug('Women Digital Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Chronographic Watches',
                                'slug' => Str::slug('Women Chronographic Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Analog / Historical Watches',
                                'slug' => Str::slug('Women Analog / Historical Watches'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Accessories',
                        'slug' => Str::slug('Women Accessories'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Bags',
                                'slug' => Str::slug('Women Bags'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Brooches',
                                'slug' => Str::slug('Women Brooches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Hats / Caps / Gloves',
                                'slug' => Str::slug('Women Hats / Caps / Gloves'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Belts / Wallets',
                                'slug' => Str::slug('Women Belts / Wallets'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Sunglasses',
                                'slug' => Str::slug('Women Sunglasses'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Jewellery',
                        'slug' => Str::slug('Women Jewellery'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Jewellery Sets',
                                'slug' => Str::slug('Women Jewellery Sets'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Pendants',
                                'slug' => Str::slug('Women Jewellery Pendants'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Necklace',
                                'slug' => Str::slug('Women Jewellery Necklace'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Ear Rings',
                                'slug' => Str::slug('Women Jewellery Ear Rings'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Rings',
                                'slug' => Str::slug('Women Jewellery Rings'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Ear Studs',
                                'slug' => Str::slug('Women Jewellery Ear Studs'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Anklets',
                                'slug' => Str::slug('Women Jewellery Anklets'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Bracelets',
                                'slug' => Str::slug('Women Jewellery Bracelets'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Bangles',
                                'slug' => Str::slug('Women Jewellery Bangles'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewellery Nose Pins',
                                'slug' => Str::slug('Women Jewellery Nose Pins'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Computers',
                'slug' => Str::slug('Computers'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Televisions & Video Devices',
                        'slug' => Str::slug('Televisions & Video Devices'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Projectors',
                        'slug' => Str::slug('Projectors'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'DVD / BluRay Players',
                        'slug' => Str::slug('DVD / BluRay Players'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Car Audio / GPS',
                        'slug' => Str::slug('Car Audio / GPS'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Security Cameras',
                        'slug' => Str::slug('Security Cameras'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Digital Cameras',
                        'slug' => Str::slug('Digital Cameras'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Camera Accessories',
                        'slug' => Str::slug('Camera Accessories'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Computing',
                        'slug' => Str::slug('Computing'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Desktops / Monitors',
                                'slug' => Str::slug('Desktops / Monitors'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Laptops',
                                'slug' => Str::slug('Laptops'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Printers / Scanners',
                                'slug' => Str::slug('Printers / Scanners'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Storage Devices / Accessories',
                                'slug' => Str::slug('Storage Devices / Accessories'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Gaming PC / Peripherals',
                                'slug' => Str::slug('Gaming PC / Peripherals'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Networking',
                                'slug' => Str::slug('Networking'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Video Games',
                        'slug' => Str::slug('Video Games'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Gaming Consoles',
                                'slug' => Str::slug('Gaming Consoles'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Board & Card Games',
                                'slug' => Str::slug('Board & Card Games'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Gaming Accessories',
                                'slug' => Str::slug('Gaming Accessories'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Mobile Phones',
                        'slug' => Str::slug('Mobile Phones'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Tablets',
                        'slug' => Str::slug('Tablets'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'LandLines Sets',
                        'slug' => Str::slug('LandLines Sets'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Phone & Tablet Accessories',
                        'slug' => Str::slug('Phone & Tablet Accessories'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Access Control',
                        'slug' => Str::slug('Access Control'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Attendance Devices',
                        'slug' => Str::slug('Attendance Devices'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Security Products',
                        'slug' => Str::slug('Security Products'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Fire Fighting Equipment',
                        'slug' => Str::slug('Fire Fighting Equipment'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Fire Alarm System',
                                'slug' => Str::slug('Fire Alarm System'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Fire Building Equipment',
                                'slug' => Str::slug('Fire Building Equipment'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Lift Style',
                'slug' => Str::slug('Lift Style'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Generators / Power Suppliers',
                        'slug' => Str::slug('Generators / Power Suppliers'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Washers / Dryers',
                        'slug' => Str::slug('Washers / Dryers'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Refrigerators / Freezers',
                        'slug' => Str::slug('Refrigerators / Freezers'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Dishwashers',
                        'slug' => Str::slug('Dishwashers'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Heating Items',
                        'slug' => Str::slug('Heating Items'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Gysers',
                                'slug' => Str::slug('Gysers'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Room Heaters',
                                'slug' => Str::slug('Room Heaters'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kitchen Appliances',
                        'slug' => Str::slug('Kitchen Appliances'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Vacuums & Floor Care',
                                'slug' => Str::slug('Vacuums & Floor Care'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'AC Cooling & Air Appliances',
                                'slug' => Str::slug('AC Cooling & Air Appliances'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Personal Care Appliances',
                                'slug' => Str::slug('Personal Care Appliances'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Sports',
                'slug' => Str::slug('Sports'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Team Sports',
                        'slug' => Str::slug('Team Sports'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Racket Sports',
                        'slug' => Str::slug('Racket Sports'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Shoes / Clothing',
                        'slug' => Str::slug('Shoes / Clothing'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Exercise / Fitness',
                        'slug' => Str::slug('Exercise / Fitness'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Outdoor Activities',
                        'slug' => Str::slug('Outdoor Activities'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Sports Bags / Accessories',
                        'slug' => Str::slug('Sports Bags / Accessories'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Indoor Games',
                        'slug' => Str::slug('Indoor Games'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Outdoor Games',
                        'slug' => Str::slug('Outdoor Games'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Travelling - Tourisum',
                        'slug' => Str::slug('Travelling - Tourisum'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Sports Nutrition & Suppliments',
                        'slug' => Str::slug('Sports Nutrition & Suppliments'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Kids & Toys',
                        'slug' => Str::slug('Kids and Toys'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Kids Watches',
                                'slug' => Str::slug('Kids Watches'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Kids Toys',
                                'slug' => Str::slug('Kids Toys'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Books',
                'slug' => Str::slug('Books'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'School Books / Essentials',
                        'slug' => Str::slug('School Books / Essentials'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'School Books',
                                'slug' => Str::slug('School Books'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'School Bags',
                                'slug' => Str::slug('School Bags'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'School Shoes',
                                'slug' => Str::slug('School Shoes'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Water Bottles',
                                'slug' => Str::slug('Water Bottles'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Uniforms',
                                'slug' => Str::slug('Uniforms'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Miscellaneous Items',
                                'slug' => Str::slug('Miscellaneous Items'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Books / Magazines',
                        'slug' => Str::slug('Books / Magazines'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'History',
                                'slug' => Str::slug('History'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Politics',
                                'slug' => Str::slug('Politics'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Science',
                                'slug' => Str::slug('Science'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Religion',
                                'slug' => Str::slug('Religion'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Fictions',
                                'slug' => Str::slug('Fictions'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Novels',
                                'slug' => Str::slug('Novels'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Poetry',
                                'slug' => Str::slug('Poetry'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Curiculum Books',
                                'slug' => Str::slug('Curiculum Books'),
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'E-Books',
                        'slug' => Str::slug('E-Books'),
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'History',
                                'slug' => Str::slug('E History'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Politics',
                                'slug' => Str::slug('E Politics'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Science',
                                'slug' => Str::slug('E Science'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Religion',
                                'slug' => Str::slug('E Religion'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Fictions',
                                'slug' => Str::slug('E Fictions'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Novels',
                                'slug' => Str::slug('E Novels'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Poetry',
                                'slug' => Str::slug('E Poetry'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Curriculum Books',
                                'slug' => Str::slug('E Curriculum Books'),
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Stationery & Crafts',
                                'slug' => Str::slug('E Stationery & Crafts'),
                                'parent_id' => null,
                                'child' => [
                                    [
                                        'name' => 'Pens',
                                        'slug' => Str::slug('Pens'),
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Papers',
                                        'slug' => Str::slug('Papers'),
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Registers',
                                        'slug' => Str::slug('Registers'),
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Note Books',
                                        'slug' => Str::slug('Note Books'),
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Pencils',
                                        'slug' => Str::slug('Pencils'),
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Geomatry Boxes',
                                        'slug' => Str::slug('Geomatry Boxes'),
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Others',
                                        'slug' => Str::slug('Others'),
                                        'parent_id' => null,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Food & Health',
                'slug' => Str::slug('Food & Health'),
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Health & Beauty',
                        'slug' => Str::slug('Health & Beauty'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Fragrances',
                        'slug' => Str::slug('Fragrances'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Hair Care',
                        'slug' => Str::slug('Hair Care'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Skin Care',
                        'slug' => Str::slug('Skin Care'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Masks',
                        'slug' => Str::slug('Masks'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Gloves',
                        'slug' => Str::slug('Gloves'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Devices',
                        'slug' => Str::slug('Devices'),
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Medicines',
                        'slug' => Str::slug('Medicines'),
                        'parent_id' => null,
                    ],
                ],
            ],

        ];

        $this->triverseAndSave($data);
    }

    private function triverseAndSave($data, $parent_id = null)
    {
        foreach ($data as $value) {

            $value['id'] = Str::orderedUuid()->toString();

            $model = new Category([
                'id' => $value['id'],
                'name' => $value['name'],
                'slug' => $value['slug'],
                'parent_id' => $parent_id,
            ]);

            if (isset($value['child'])) {
                $this->triverseAndSave($value['child'], $value['id']);
            }

            $model->save();
        }
    }
}
