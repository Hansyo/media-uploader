<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can editable the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function editable(User $user, Image $image)
    {
        return $user->id === $image->user_id
        ? Response::allow()
        : Response::deny('You do not own this image.');
    }
}
