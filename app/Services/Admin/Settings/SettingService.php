<?php

namespace App\Services\Admin\Settings;

use App\Models\Setting;

class SettingService implements SettingInterface
{
    private function model()
    {
        return new Setting();
    }
}
