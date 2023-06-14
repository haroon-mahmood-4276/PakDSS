<?php

namespace App\Services\Admin\SettingsSite;

use App\Models\SettingsSite;

class SettingsSiteService implements SettingsSiteInterface
{
    private function model()
    {
        return new SettingsSite();
    }
}
