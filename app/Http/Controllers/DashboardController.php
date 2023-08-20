<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke(Request $request,Site $site)
    {
        return inertia()->render('Dashboard',[
            'site'=>SiteResource::make($site),
            'sites'=>SiteResource::collection(Site::get()),
        ]); 
        
    }
}
