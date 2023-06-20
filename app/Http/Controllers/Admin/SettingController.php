<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Settings\SettingInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('');
    }
}
