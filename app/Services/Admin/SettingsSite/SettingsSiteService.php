<?php

namespace App\Services\Admin\SettingsSite;

use App\Models\Admin;

class SettingsSiteService implements SettingsSiteInterface
{
    private function model()
    {
        return new Admin();
    }
}
