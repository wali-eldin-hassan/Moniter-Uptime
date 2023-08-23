<?php

namespace App\Observers;

use App\Models\EndPoint;
use Illuminate\Support\Arr;

class EndPointObserver
{
    function creating(EndPoint $endPoint)
    {
        $paresd = parse_url($endPoint->site->url() . '/' . $endPoint->location);
        $endPoint->location = "/" . trim(Arr::get($paresd, 'path'), '/');
        $endPoint->next_check = now()->addSeconds($endPoint->frequency);
    }
}
