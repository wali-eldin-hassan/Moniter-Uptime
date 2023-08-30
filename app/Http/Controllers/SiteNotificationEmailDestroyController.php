<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteNotificationEmailDestroyController extends Controller
{
    function __invoke(Request $request, Site $site)
    {
        $updatedEmails = array_values(array_diff(json_decode($site->notification_emails, true), [$request->email]));
        
        $site->update(['notification_emails' => json_encode($updatedEmails)]);

        return back();
    }
}
