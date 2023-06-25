<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\updateRequest;
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
        abort_if(request()->ajax() || auth('admin')->user()->cannot('admin.settings.tab_' . $request->get('tab') . '.index'), 403);

        $data = [
            'tab' => $request->get('tab'),
            'fields' => $this->settingInterface->getFields($request->get('tab')),
        ];

        return view('admin.settings.index', $data);
    }

    public function store(updateRequest $request)
    {
        abort_if(request()->ajax() || auth('admin')->user()->cannot('admin.settings.tab_' . $request->get('tab') . '.index'), 403);
        dd($request->all());
    }
}
