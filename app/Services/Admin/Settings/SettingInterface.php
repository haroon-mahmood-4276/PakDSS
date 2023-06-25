<?php

namespace App\Services\Admin\Settings;

interface SettingInterface
{
    public function getFields($tab_id);
}
