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
                'tab_id' => 'site_tab',
                'key' => Str::of('Site Name')->slug()->replace('-', '_'),
                'value' => 'PakDSS',
            ],
            [
                'tab_id' => 'admin_tab',
                'key' => Str::of('One Dollor Rate')->slug()->replace('-', '_'),
                'value' => 283.71,
            ],
            [
                'tab_id' => 'admin_tab',
                'key' => Str::of('One Pound Rate')->slug()->replace('-', '_'),
                'value' => 283.71,
            ],
            [
                'tab_id' => 'admin_tab',
                'key' => Str::of('Rate Auto Update')->slug()->replace('-', '_'),
                'value' => true,
            ],
        ];

        foreach ($data as $value) {
            (new Setting())->create($value);
        }
    }
}
