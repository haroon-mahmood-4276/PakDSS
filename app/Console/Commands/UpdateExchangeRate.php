<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:exchange-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to update the exchange rates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (settings('rate_auto_update') === '1') {
            $response = Http::get('https://openexchangerates.org/api/latest.json', [
                'app_id' => env('EXCHANGE_RATES_APP_ID'),
            ]);

            if ($response->successful()) {
                $response = $response->json();

                $USDToPKR = $response['rates']['PKR'];
                $GBPToPKR = (1 / floatval($response['rates']['GBP'])) * floatval($response['rates']['PKR']);

                settings_update(['one_dollor_rate', 'one_pound_rate'], [number_format($USDToPKR, 2), number_format($GBPToPKR, 2)]);
            }
        }
    }
}
