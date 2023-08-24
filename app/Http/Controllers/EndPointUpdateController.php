<?php

namespace App\Http\Controllers;

use App\Http\Requests\EndPointUpdateRequest;
use App\Models\EndPoint;

class EndPointUpdateController extends Controller
{
    function __invoke(EndPointUpdateRequest $request, EndPoint $endpoint)
    {
        

        $endpoint->update($request->validated());

        return back();
    }
}
