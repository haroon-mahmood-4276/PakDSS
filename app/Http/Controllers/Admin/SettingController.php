<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Settings\SettingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    private $settingInterface;

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax() || auth('admin')->user()->cannot('admin.settings.tab_' . $request->get('tab') . '.index'), 403);

        $data = [
            'tab' => $request->get('tab'),
        ];

        return view('admin.settings.index', $data);
    }
}
