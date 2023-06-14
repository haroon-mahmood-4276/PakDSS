<?php

namespace Database\Seeders;

use App\Models\SettingsSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingsSiteSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingsSite::truncate();
        $data = [
            [
                'tab_id' => 'general',
                'text' => 'Site Name',
                'key' => Str::of('Site Name')->slug(),
                'value' => 'PakDSS',
                'rules' => 'required|string|between:3,10',
            ],
            [
                'tab_id' => 'general',
                'text' => 'One Dollor Rate',
                'key' => Str::of('One Dollor Rate')->slug(),
                'value' => 283.71,
                'rules' => 'required|numeric|gte:0',
            ],
            [
                'tab_id' => 'general',
                'text' => 'One Pound Rate',
                'key' => Str::of('One Pound Rate')->slug(),
                'value' => 283.71,
                'rules' => 'required|numeric|gte:0',
            ],
        ];

        foreach ($data as $value) {
            (new SettingsSite())->create($value);
        }
    }
}
