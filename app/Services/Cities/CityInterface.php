<?php

namespace App\Services\Cities;

interface CityInterface
{
    public function search($search = null, $per_page = 10, $state_id = null, $ignore_id = null);
}
