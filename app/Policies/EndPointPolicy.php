<?php

namespace App\Policies;

use App\Models\Endpoint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EndPointPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Endpoint $endpoint)
    {
        return  $user->id === $endpoint->site->user_id;
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Endpoint $endpoint)
    {
        
          return  $user->id === $endpoint->site->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Endpoint $endpoint)
    {
        return  $user->id === $endpoint->site->user_id;
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Endpoint $endpoint)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Endpoint $endpoint)
    {
        //
    }
}
