<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\updateRequest;
use App\Services\Admin\Settings\SettingInterface;
use Exception;
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

        return view('admin.settings.index', [
            'tab' => $request->get('tab'),
        ]);
    }

    public function store(updateRequest $request)
    {
        abort_if(request()->ajax() || auth('admin')->user()->cannot('admin.settings.tab_' . $request->get('tab') . '.index'), 403);

        try {
            $inputs = $request->validated();
            $this->settingInterface->store($inputs);

            return redirect()->route('admin.settings.index', ['tab' => $inputs['tab']])->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.settings.index', ['tab' => $inputs['tab']])->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.settings.index', ['tab' => $inputs['tab']])->withDanger('Something went wrong!');
        }
    }
}
