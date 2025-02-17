<?php

namespace App\Policies;

use App\Models\Bot;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class BotPolicy extends MasterPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //anyone can view a list of bots
        //the query will limit the users
        return Response::allow();
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bot  $bot
     * @return mixed
     */
    public function view(User $user, Bot $bot)
    {
        return $this->checkIfAdminOrOwner($user, $bot, true);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //anyone can create an items for themselves
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bot  $bot
     * @return mixed
     */
    public function update(User $user, Bot $bot)
    {
        return $this->checkIfAdminOrOwner($user, $bot);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bot  $bot
     * @return mixed
     */
    public function delete(User $user, Bot $bot)
    {
        return $this->checkIfAdminOrOwner($user, $bot);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bot  $bot
     * @return mixed
     */
    public function restore(User $user, Bot $bot)
    {
        return $this->checkIfAdminOrOwner($user, $bot);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bot  $bot
     * @return mixed
     */
    public function forceDelete(User $user, Bot $bot)
    {
        //only admins can do this
        return $user->hasRole('admin')
            ? Response::allow()
            : Response::deny('You cannot perform this action.');
    }
}
