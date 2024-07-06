<?php

namespace App\Services\Orders;

use App\Models\User;

interface OrderInterface
{
    public function getLatestOrderNumber();

    public function store(User $user, $inputs);
}
