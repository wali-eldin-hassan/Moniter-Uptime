<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;

class SitePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    
    function store(User $user, Site $site)
    {
        
        return $user->id === $site->user_id;
    }
}
