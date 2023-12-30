<?php

use App\Models\Cart;

if (!function_exists('cartCount')) {
    function cartCount($user_id)
    {
        return 0;
    }
}
