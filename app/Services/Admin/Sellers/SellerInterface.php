<?php

namespace App\Services\Admin\Sellers;

use App\Utils\Traits\InterfaceShared;

interface SellerInterface extends InterfaceShared
{
    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
