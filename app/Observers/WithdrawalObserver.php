<?php

namespace App\Observers;

use App\Helper\UserBalance;
use App\Helper\UserTransfer;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\Withdrawal;

class WithdrawalObserver
{
    /**
     * Handle the Withdrawal "created" event.
     */
    public function created(Withdrawal $withdrawal): void
    {
        if($withdrawal->status == Withdrawal::STATUS_PAYED) {
            $this->createTransfer($withdrawal);
        }
    }

    /**
     * Handle the Withdrawal "updated" event.
     */
    public function updated(Withdrawal $withdrawal): void
    {
        if($withdrawal->status == Withdrawal::STATUS_PAYED) {
            $this->createTransfer($withdrawal);
        }

    }

    function createTransfer(Withdrawal $withdrawal){
        $t = new Transfer();
        $t->sum = $withdrawal->sum;
        $t->created_at = $withdrawal->payed_at;
        $t->type = Transfer::TYPE_WITHDRAWAL;
        $t->name = $withdrawal->type;
        $t->user_id = $withdrawal->user_id;
        $t->object_id = $withdrawal->id;
        $t->fee = $withdrawal->fee;
        $t->save();
    }

    /**
     * Handle the Withdrawal "deleted" event.
     */
    public function deleted(Withdrawal $withdrawal): void
    {
        //
    }

    /**
     * Handle the Withdrawal "restored" event.
     */
    public function restored(Withdrawal $withdrawal): void
    {
        //
    }

    /**
     * Handle the Withdrawal "force deleted" event.
     */
    public function forceDeleted(Withdrawal $withdrawal): void
    {
        //
    }
}
