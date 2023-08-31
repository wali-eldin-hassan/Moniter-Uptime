<?php

namespace App\Observers;

use App\Models\Check;

class CheckObserver
{
    function created(Check $check)
    {
        \Log::info("CheckObserver created");
    }
}
