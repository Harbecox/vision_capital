<?php

namespace App\Observers;

use App\Models\UserBalance;

class BalanceObserver
{
    /**
     * Handle the UserBalance "created" event.
     */
    public function created(UserBalance $userBalance): void
    {
        //
    }

    /**
     * Handle the UserBalance "updated" event.
     */
    public function updated(UserBalance $userBalance): void
    {
        $userBalance->changes()->create([
            "amount" => $userBalance->total,
            "created_at" => $userBalance->updated_at
        ]);
    }

    /**
     * Handle the UserBalance "deleted" event.
     */
    public function deleted(UserBalance $userBalance): void
    {
        //
    }

    /**
     * Handle the UserBalance "restored" event.
     */
    public function restored(UserBalance $userBalance): void
    {
        //
    }

    /**
     * Handle the UserBalance "force deleted" event.
     */
    public function forceDeleted(UserBalance $userBalance): void
    {
        //
    }
}
