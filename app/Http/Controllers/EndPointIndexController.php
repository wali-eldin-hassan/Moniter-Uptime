<?php

namespace App\Http\Controllers;

use App\Http\Resources\EndpointResource;
use App\Models\EndPoint;
use Illuminate\Http\Request;

class EndPointIndexController extends Controller
{
    function __invoke(Request $request, EndPoint $endpoint)
    {
        $this->authorize('view', $endpoint);

        return inertia()->render('Endpoint', [
            'endpoint' => EndpointResource::make($endpoint),
        ]);
    }
}
