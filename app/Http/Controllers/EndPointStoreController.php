<?php

namespace App\Http\Controllers;

use App\Enums\EndPointFrequency;
use App\Http\Requests\EndPointStoreRequest;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class EndPointStoreController extends Controller
{
    function __invoke(EndPointStoreRequest $request, Site $site)
    {

        $site->endpoints()->create($request->validated());

        return  back();
    }
}
