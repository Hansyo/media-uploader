<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class VideoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can editable the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function editable(User $user, Video $video)
    {
        return $user->id === $video->user_id
        ? Response::allow()
        : Response::deny('You do not own this video.');
    }
}
