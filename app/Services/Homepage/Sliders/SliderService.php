<?php

namespace App\Services\Homepage\Sliders;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderService implements SliderInterface
{
    private function model()
    {
        return new Slider();
    }

}
