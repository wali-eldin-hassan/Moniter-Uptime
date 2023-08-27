<?php

namespace App\Http\Controllers;

use App\Http\Resources\EndpointResource;
use App\Models\EndPoint;
use Illuminate\Http\Request;

class EndPointIndexController extends Controller
{
    function __invoke(Request $request, EndPoint $endpoint)
    {

        return inertia()->render('Endpoint',[
            'endpoint' => EndpointResource::make($endpoint),
        ]);
    }
}
