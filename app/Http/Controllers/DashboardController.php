<?php

namespace App\Http\Controllers;

use App\Enums\EndPointFrequency;
use App\Http\Resources\EndpointFrequencyResource;
use App\Http\Resources\EndpointResource;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke(Request $request, Site $site)
    {
        $site->update(['default' => true]);


        if (!$site->exists) {
            $site = $request->user()->sites()->whereDefault(true)->first() ?? $request->user()->sites()->first();
        }

        return inertia()->render('Dashboard', [
            'site' => SiteResource::make($site),
            'endpoints' => EndpointResource::collection($site->endpoints) ,
        ]);
    }
}
