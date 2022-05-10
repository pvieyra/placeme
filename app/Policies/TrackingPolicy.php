<?php

namespace App\Policies;

use App\Models\Tracking;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackingPolicy {
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){

    }

    public function view( User $user, Tracking $tracking){
      return $user->id === $tracking->user_id;
    }
}
