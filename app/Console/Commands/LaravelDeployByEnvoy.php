<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;

class LaravelDeployByEnvoy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pakdss:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to deploy laravel app to server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = Process::run('php vendor/bin/envoy run deploy', function (string $type, string $output) {
            $this->info($output);
        });

        $this->newLine();
    }
}
