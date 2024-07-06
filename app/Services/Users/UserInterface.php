<?php

namespace App\Services\Users;

use App\Utils\Traits\InterfaceShared;

interface UserInterface extends InterfaceShared
{
    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
