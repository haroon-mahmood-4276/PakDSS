<?php

namespace App\Services\Brands;

use App\Utils\Traits\InterfaceShared;

interface BrandInterface extends InterfaceShared
{
    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
