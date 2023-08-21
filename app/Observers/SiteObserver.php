<?php

namespace App\Observers;

use App\Models\Site;
use Illuminate\Support\Arr;

class SiteObserver
{
    /**
     * Handle the Site "creating" event.
     */
    public function creating(Site $site)
    {
        $parsed = parse_url($site->domain);

        $site->scheme = Arr::get($parsed, 'scheme');
        
        $site->domain = Arr::get($parsed, 'host');
    }

    /**
     * Handle the Site "updated" event.
     */
    public function updated(Site $site): void
    {
        if (in_array('default', array_keys($site->getDirty()))) {
            $site->user->sites()->whereNot('id', $site->id)->update(['default' => false]);
        }
    }

    /**
     * Handle the Site "deleted" event.
     */
    public function deleted(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "restored" event.
     */
    public function restored(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "force deleted" event.
     */
    public function forceDeleted(Site $site): void
    {
        //
    }
}
