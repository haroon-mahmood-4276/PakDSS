<?php

namespace App\Services\Requests;

interface RequestInterface
{
    public function find($requestFor, $id, $relationships = []);

    public function store($requestFor, $inputs);

    public function update($requestFor, $id, $inputs);

    public function destroy($requestFor, $inputs);
}
