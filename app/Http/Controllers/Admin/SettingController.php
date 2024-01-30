<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\updateRequest;
use App\Services\Admin\Settings\SettingInterface;
use Illuminate\Http\Request;
use Exception;

class SettingController extends Controller
{
    private $settingInterface;

    private $tabs = [
        'general' => [
            'title' => 'General',
            'icon' => 'fa-solid fa-user-shield',
            'sections' => [],
        ],
        'shipping' => [
            'title' => 'Shipping',
            'icon' => 'fa-solid fa-truck',
            'sections' => [
                'shipping_zones' => 'Shipping Zones',
                'shipping_classes' => 'Classes',
                'self_pickup' => 'Self Pickup',
            ]
        ]
    ];

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index(?string $tab = null, ?string $section = null)
    {
        $tab = $tab ?: 'general';

        $section = $section ?: match ($tab) {
            'shipping' => 'shipping_zones',
            default => ''
        };

        abort_if(request()->ajax() || auth('admin')->user()->cannot('admin.settings.tab_' . $tab . '.index'), 403);

        return view('admin.settings.index', ['tab' => $tab, 'section' => $section, 'tabs' => $this->tabs]);
    }

    public function store(updateRequest $request)
    {
        abort_if(request()->ajax() || auth('admin')->user()->cannot('admin.settings.tab_' . $request->tab . '.index'), 403);

        try {
            $inputs = $request->validated();
            $this->settingInterface->store($inputs);
            cache()->flush();

            return redirect()->route('admin.settings.index', ['tab' => $request->tab])->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.settings.index', ['tab' => $request->tab])->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.settings.index', ['tab' => $request->tab])->withDanger('Something went wrong!');
        }
    }
}
