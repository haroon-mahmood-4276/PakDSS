<?php

namespace App\Services\Homepage\Sliders;

use App\Utils\Traits\InterfaceShared;

interface SliderInterface extends InterfaceShared
{
    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
