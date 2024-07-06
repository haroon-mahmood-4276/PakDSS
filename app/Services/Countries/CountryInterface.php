<?php

namespace App\Services\Countries;

interface CountryInterface
{
    public function search($search = null, $per_page = 10, $ignore_id = null);
}
