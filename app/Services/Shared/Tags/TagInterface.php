<?php

namespace App\Services\Shared\Tags;

use App\Utils\Traits\InterfaceShared;

interface TagInterface extends InterfaceShared
{

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
