<?php

namespace App\Services\Shared\Categories;

use App\Utils\Traits\InterfaceShared;

interface CategoryInterface extends InterfaceShared
{

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
