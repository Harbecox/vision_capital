<?php

namespace App\Observers;

use App\Helper\UserBalance;
use App\Helper\UserTransfer;
use App\Models\Deposit;
use App\Models\Transfer;

class DepositObserver
{
    /**
     * Handle the Deposit "created" event.
     */
    public function created(Deposit $deposit): void
    {
        if($deposit->status == Deposit::STATUS_PAYED){
            $this->createTransfer($deposit);
        }
    }

    /**
     * Handle the Deposit "updated" event.
     */
    public function updated(Deposit $deposit): void
    {
        if($deposit->status == Deposit::STATUS_PAYED){
            $this->createTransfer($deposit);
        }
    }

    function createTransfer(Deposit $deposit){
        $t = new Transfer();
        $t->sum = $deposit->sum;
        if($deposit->fee > 0){
            $t->sum += $deposit->fee;
        }
        $t->created_at = $deposit->payed_at;
        $t->type = Transfer::TYPE_DEPOSIT;
        $t->fee = $deposit->fee;
        $t->name = $deposit->type;
        $t->user_id = $deposit->user_id;
        $t->object_id = $deposit->id;
        $t->save();
    }

    /**
     * Handle the Deposit "deleted" event.
     */
    public function deleted(Deposit $deposit): void
    {
        //
    }

    /**
     * Handle the Deposit "restored" event.
     */
    public function restored(Deposit $deposit): void
    {
        //
    }

    /**
     * Handle the Deposit "force deleted" event.
     */
    public function forceDeleted(Deposit $deposit): void
    {
        //
    }
}
