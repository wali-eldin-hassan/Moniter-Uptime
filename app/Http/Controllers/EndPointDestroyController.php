<?php

namespace App\Http\Controllers;

use App\Models\EndPoint;
use Illuminate\Http\Request;

class EndPointDestroyController extends Controller
{
    function __invoke(EndPoint $endpoint)
    {
        if (auth()->id() === $endpoint->site->user_id) {
            $endpoint->delete();
        } else {
            abort(403);
        }

        return back();
    }
}
