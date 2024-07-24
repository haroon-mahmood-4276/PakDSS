<?php

namespace App\Services\Addresses;

interface AddressInterface
{
    public function get($user_id, $relationships = [], $withPagination = false, $perPage = 10);

    public function find($id, $relationships = []);

    public function store($user_id, $inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
