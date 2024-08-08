<?php

namespace App\Services\Homepage\Sliders;

use App\Models\Slider;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;

class SliderService implements SliderInterface
{
    use ServiceShared;
    
    private function model()
    {
        return new Slider();
    }

    public function store($inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs));
    }

    public function update($id, $inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs, $id));
    }

    public function destroy($inputs)
    {
        return DB::transaction(fn () => $this->model()->whereIn('id', $inputs)->get()->each(function ($slider) {
            $slider->clearMediaCollection('sliders');
            $slider->delete();
        }));
    }

    private function createOrUpdate($inputs, $id = 0)
    {
        $slider = $this->model()->updateOrCreate(
            ['id' => $id],
            ['name' => $inputs['name'], 'collection_name' => 'banner_slider']
        );

        $slider->clearMediaCollection('sliders');

        if (isset($inputs['slider_image'])) {
            $slider->addMedia($inputs['slider_image'])->toMediaCollection('sliders');
        }

        return $slider;
    }
}
