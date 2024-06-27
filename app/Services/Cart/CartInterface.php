<?php

namespace App\Services\Cart;

interface CartInterface
{
    public function get($user_id, $relationships = []);
    
    // public function find($id, $relationships = []);

    public function store($user_id, $inputs);

    public function update($cart_id, $quantity);

    public function destroy($cart_id);
}
