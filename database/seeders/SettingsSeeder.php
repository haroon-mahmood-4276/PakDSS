<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();
        $data = [
            [
                'tab_id' => 'admin_tab',
                'text' => 'Site Name',
                'key' => Str::of('Site Name')->slug(),
                'value' => 'PakDSS',
                'rules' => 'required|string|between:3,10',
                'columns' => 6,
                'order' => 1
            ],
            [
                'tab_id' => 'admin_tab',
                'text' => 'One Dollor Rate',
                'key' => Str::of('One Dollor Rate')->slug(),
                'value' => 283.71,
                'rules' => 'required|numeric|gte:0',
                'columns' => 6,
                'order' => 2
            ],
            [
                'tab_id' => 'admin_tab',
                'text' => 'One Pound Rate',
                'key' => Str::of('One Pound Rate')->slug(),
                'value' => 283.71,
                'rules' => 'required|numeric|gte:0',
                'columns' => 6,
                'order' => 3
            ],
        ];

        foreach ($data as $value) {
            (new Setting())->create($value);
        }
    }
}
