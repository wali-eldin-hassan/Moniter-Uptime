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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PreformEndpointCheck implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public EndPoint $endpoint)
    {
    }

    function uniqId()
    {
        return 'endpint_id' . $this->endpoint->id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        DB::transaction(function () {
            $reponse = Http::get($this->endpoint->url());
            $this->endpoint->checks()->create([
                'response_code' => $reponse->status(),
                'response_body' =>  $reponse->successful() == false ? substr($reponse->body(), 0, 1024) : null,
            ]);

            $this->endpoint->update([
                'next_check' => now('Africa/Cairo')->addSeconds($this->endpoint->frequency)
            ]);
        });
    }
}
