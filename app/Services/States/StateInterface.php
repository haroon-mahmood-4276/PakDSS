<?php

namespace App\Services\States;

interface StateInterface
{
    public function search($search = null, $per_page = 10, $country_id = null, $ignore_id = null);
}
