<?php

namespace App\Services\Seller\Requests;

interface RequestInterface
{
    public function store($requestFor, $inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
