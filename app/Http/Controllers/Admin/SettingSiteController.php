<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SettingsSite\SettingsSiteInterface;
use Illuminate\Http\Request;

class SettingSiteController extends Controller
{
    private $settingsSiteInterface;

    public function __construct(SettingsSiteInterface $settingsSiteInterface)
    {
        $this->settingsSiteInterface = $settingsSiteInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        return view('');
    }
}
