<?php

namespace App\Observers;

use App\Helper\Settings;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $last_user = User::query()->orderByDesc("account")->first();
        $account = ($last_user && $last_user->id != $user->id) ? $last_user->account : Settings::get("acc_start_num");
        $account += rand(2,6);

        $user->account = $account;
        $user->save();
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
