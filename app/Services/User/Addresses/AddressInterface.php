<?php

namespace App\Services\User\Addresses;

use App\Utils\Traits\InterfaceShared;

interface AddressInterface extends InterfaceShared
{
    public function get($relationships = [], $ignore = null, $with_tree = false, $withCount = false, $withPagination = false, $perPage = 10, $includeOnlyLast = false);

    public function find($id, $relationships = []);

    public function store($user_id, $inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
