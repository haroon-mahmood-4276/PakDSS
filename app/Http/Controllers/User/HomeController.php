<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryInterface;
use App\Services\Homepage\Sliders\SliderInterface;
use App\Services\Products\ProductInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;
    private SliderInterface $sliderInterface;

    public function __construct(CategoryInterface $categoryInterface, ProductInterface $productInterface, SliderInterface $sliderInterface)
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->sliderInterface = $sliderInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'bannerSliders' => $this->sliderInterface->get(['media']),
            'categoriesProducts' => $this->productInterface->getAllByParentCategory($this->categoryInterface->getParents(), ['brand', 'media', 'seller'], 6),
        ];

        $data['categoriesProducts'] = collect($data['categoriesProducts'])->map(function ($category) {
            return count($category) > 0 ? $category : null;
        })->filter();

        return view('user.home', $data);
    }
}
