<?php

namespace App\Jobs;

use App\Models\EndPoint;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class PreformEndpointCheck
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public EndPoint $endpoint)
    {

    
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        try {
            $reponse = Http::get($this->endpoint->url());
            dd($reponse->status());
        } catch (Exception $e) {
        }

        $this->endpoint->update([
            'next_check' => now()->addSeconds($this->endpoint->frequency)
        ]);
    }
}
