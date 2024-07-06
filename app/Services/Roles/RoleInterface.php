<?php

namespace App\Services\Roles;

use App\Utils\Traits\InterfaceShared;

interface RoleInterface extends InterfaceShared
{
    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
