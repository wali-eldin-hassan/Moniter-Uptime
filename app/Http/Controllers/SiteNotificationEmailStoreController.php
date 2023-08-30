<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteNotificationEmailRequest;
use App\Models\Site;


class SiteNotificationEmailStoreController extends Controller
{
    function __invoke(SiteNotificationEmailRequest $request, Site $site)
    {
        $emails = json_decode($site->notification_emails, true) ?: [];

        array_unshift($emails, $request->email);

        $site->update(['notification_emails' => json_encode($emails)]);
        
        return back();
    }
}
