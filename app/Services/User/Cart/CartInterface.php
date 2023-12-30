<?php

namespace App\Services\User\Cart;

interface CartInterface
{
    public function get($user_id, $relationships = []);
    
    // public function find($id, $relationships = []);

    public function store($user_id, $inputs);

    // public function update($id, $inputs);

    // public function destroy($inputs);
}
