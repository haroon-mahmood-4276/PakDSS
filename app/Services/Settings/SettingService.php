<?php

namespace App\Services\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SettingService implements SettingInterface
{
    private function model()
    {
        return new Setting();
    }

    public function getFields($tab_id)
    {
        return $this->model()->whereTabId($tab_id . '_tab')->keyBy('key');
    }

    public function store($inputs)
    {
        unset($inputs['tab']);
        $returnData = DB::transaction(function () use ($inputs) {
            foreach ($inputs as $key => $value) {
                $this->model()->firstWhere('key', $key)->update([
                    'value' => $value
                ]);

                if ($key === 'rate_auto_update' && $value === '1' && $value !== settings('rate_auto_update')) {
                    Artisan::call('update:exchange-rate');
                }
            }
        });

        return $returnData;
    }
}
