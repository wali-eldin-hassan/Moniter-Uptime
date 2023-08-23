<?php

namespace App\Observers;

use App\Models\EndPoint;

class EndPointObserver
{
    function creating(EndPoint $endPoint)
    {

        $endPoint->next_check = now()->addSeconds($endPoint->frequency);
        
    }
}
