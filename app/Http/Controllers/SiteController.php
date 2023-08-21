<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'domain' => 'required', 'url'
        ]);
        $site = $request->user()->sites()->create($data);

        return redirect()->route('dashboard', $site);
    }
}
