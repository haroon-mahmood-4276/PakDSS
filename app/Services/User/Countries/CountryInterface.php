<?php

namespace App\Services\User\Countries;

interface CountryInterface
{
    public function search($search = null, $per_page = 10, $ignore_id = null);
}
