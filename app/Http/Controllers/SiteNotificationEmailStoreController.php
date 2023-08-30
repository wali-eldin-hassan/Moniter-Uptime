<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteNotificationEmailRequest;
use App\Models\Site;


class SiteNotificationEmailStoreController extends Controller
{
    function __invoke(SiteNotificationEmailRequest $request, Site $site)
    {
        $site->update(['notification_emails' =>$request->email]);

        return back();
    }
}
