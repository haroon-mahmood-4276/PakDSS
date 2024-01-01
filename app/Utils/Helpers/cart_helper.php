<?php

use App\Models\Cart;

if (!function_exists('cartCount')) {
    function cartCount($user_id)
    {
        return Cart::where('user_id', $user_id)->count();
    }
}
