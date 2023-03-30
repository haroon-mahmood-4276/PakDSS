<?php

namespace App\Services\Admin\Roles;

interface RoleInterface
{
    public function getAll($ignore = null, $with_tree = false);

    public function getById($id);

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
