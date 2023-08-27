<?php

namespace App\Http\Resources;

use App\Enums\EndPointFrequency;
use App\Models\EndPoint;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\ErrorHandler\Collecting;

class EndpointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'frequency_lable' => EndPointFrequency::from($this->frequency)->lable(),
            'frequency_value' => EndPointFrequency::from($this->frequency)->value,
            'latest_check' => CheckResource::make($this->check),
            'url' => $this->url(),
            'site' => SiteResource::make($this->site),
            'checks' => CheckResource::collection($this->checks),

        ];
    }
}
