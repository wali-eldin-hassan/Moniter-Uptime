<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class EndPointStoreController extends Controller
{
    function __invoke(Request $request, Site $site)
    {
        $site->endpoints()->create($request->all());
        
        return  back();
    }
}
