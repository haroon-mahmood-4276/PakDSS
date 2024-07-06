<?php

namespace App\Services\Settings;

interface SettingInterface
{
    public function getFields($tab_id);

    public function store($inputs);
}
