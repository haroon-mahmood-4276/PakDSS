<?php

namespace App\Services\Sellers;

use App\Utils\Traits\InterfaceShared;

interface SellerInterface extends InterfaceShared
{
    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);

    public function status($ids, $status);
}
