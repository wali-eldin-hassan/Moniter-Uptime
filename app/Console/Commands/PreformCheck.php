<?php

namespace App\Console\Commands;

use App\Jobs\PreformEndpointCheck;
use App\Models\EndPoint;
use GrahamCampbell\ResultType\Success;
use Illuminate\Console\Command;

class PreformCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checks:preform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'preform endpoint checks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        EndPoint::where('next_check', '>=', now())->each(function ($endpoint) {
            PreformEndpointCheck::dispatch($endpoint);
        });
 

        return Command::SUCCESS;
    }
}
