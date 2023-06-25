<?php

namespace App\Services\Admin\Settings;

use App\Models\Setting;

class SettingService implements SettingInterface
{
    private function model()
    {
        return new Setting();
    }

    public function getFields($tab_id)
    {
        return $this->model()->whereTabId($tab_id . '_tab')->orderBy('order')->get();
    }
}
