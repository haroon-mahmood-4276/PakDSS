<?php

namespace App\Services\Admin\Permissions;

interface PermissionInterface
{
    public function get();
    public function find($id);

    public function store($inputs);
    public function update($id, $inputs);

    public function destroySelected($ids);

}
