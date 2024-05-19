<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    use WithoutModelEvents;
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
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Men Clothing',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Traditional Clothing',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Winter Clothing',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Inner-wear / Sleepwear',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Men Shoes',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Sandals / Slippers',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Formal Shoes',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Casual Shoes',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Sneakers',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Boots',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Shoe Care',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Sports Shoes',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Men Watches',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Smart Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Digital Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Chronographic Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Analog / Historical Watches',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Men Accessories',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Men Belts / Bags / Purses',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Caps / Gloves / Hats',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Wallets / Cardholders',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Jewelry',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Men Sunglasses',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Women',
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Women Islamic Clothes',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Scarfs',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Abaya',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Clothing',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Traditional Clothing',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Winter Clothing',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Inner-wear / Sleepwear',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Shawls',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Shoes',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Heels',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Flats / Sandals',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Sports Shoes',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Boots',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Watches',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Smart Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Digital Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Chronographic Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Analog / Historical Watches',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Accessories',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Bags',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Brooches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Hats / Caps / Gloves',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Belts / Wallets',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Sunglasses',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Women Jewelry',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Women Jewelry Sets',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Pendants',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Necklace',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Ear Rings',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Rings',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Ear Studs',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Anklets',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Bracelets',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Bangles',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Women Jewelry Nose Pins',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Computers',
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Televisions & Video Devices',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Projectors',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'DVD / BluRay Players',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Car Audio / GPS',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Security Cameras',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Digital Cameras',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Camera Accessories',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Computing',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Desktops / Monitors',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Laptops',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Printers / Scanners',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Storage Devices / Accessories',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Gaming PC / Peripherals',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Networking',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Video Games',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Gaming Consoles',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Board & Card Games',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Gaming Accessories',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Electronics',
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Mobile Phones',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Tablets',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'LandLines Sets',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Phone & Tablet Accessories',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Access Control',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Attendance Devices',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Security Products',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Fire Fighting Equipment',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Fire Alarm System',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Fire Building Equipment',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Lift Style',
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Generators / Power Suppliers',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Washers / Dryers',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Refrigerators / Freezers',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Dishwashers',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Heating Items',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Geysers',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Room Heaters',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kitchen Appliances',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Vacuums & Floor Care',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'AC Cooling & Air Appliances',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Personal Care Appliances',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Sports',
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Team Sports',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Racket Sports',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Shoes / Clothing',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Exercise / Fitness',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Outdoor Activities',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Sports Bags / Accessories',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Indoor Games',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Outdoor Games',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Traveling - Tourism',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Sports Nutrition & Supplements',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Kids & Toys',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'Kids Watches',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Kids Toys',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Books',
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'School Books / Essentials',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'School Books',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'School Bags',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'School Shoes',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Water Bottles',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Uniforms',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Miscellaneous Items',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Books / Magazines',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'History',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Politics',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Science',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Religion',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Fictions',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Novels',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Poetry',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Curriculum Books',
                                'parent_id' => null,
                            ],
                        ],
                    ],
                    [
                        'name' => 'E-Books',
                        'parent_id' => null,
                        'child' => [
                            [
                                'name' => 'History',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Politics',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Science',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Religion',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Fictions',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Novels',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Poetry',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Curriculum Books',
                                'parent_id' => null,
                            ],
                            [
                                'name' => 'Stationery & Crafts',
                                'parent_id' => null,
                                'child' => [
                                    [
                                        'name' => 'Pens',
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Papers',
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Registers',
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Note Books',
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Pencils',
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Geometry Boxes',
                                        'parent_id' => null,
                                    ],
                                    [
                                        'name' => 'Others',
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
                'parent_id' => null,
                'child' => [
                    [
                        'name' => 'Health & Beauty',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Fragrances',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Hair Care',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Skin Care',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Masks',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Gloves',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Devices',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Medicines',
                        'parent_id' => null,
                    ],
                ],
            ],

        ];

        $this->traverseAndSave($data);
    }

    private function traverseAndSave($data, $parent_id = null)
    {
        foreach ($data as $value) {

            $model = new Category([
                'name' => $value['name'],
                'slug' => Str::slug($value['name']),
                'parent_id' => $parent_id,
            ]);
            $model->save();

            if (isset($value['child'])) {
                $this->traverseAndSave($value['child'], $model->id);
            }

        }
    }
}
