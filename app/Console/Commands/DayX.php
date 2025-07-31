<?php

namespace App\Console\Commands;

use App\Helper\Settings;
use App\Helper\UserBalance;
use App\Helper\UserTransfer;
use App\Models\Deposit;
use App\Models\Fee;
use App\Models\Transfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DayX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day-x';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::all()->map(function ($user){

            $ub = UserBalance::make($user);
            $tr = UserTransfer::create($user);
            $intervals = $ub->getIntervals();
            if(count($intervals) == 0){
                return;
            }
            $day_x = $ub::getxDay();
            $div = 0;
            $fee = 0;
            foreach ($intervals as $interval){
                $div += $interval['div'];
                $fee += $interval['fee'];
            }

            $ub->add($div,$day_x);
            $tr->transfer($div + $fee,"+",UserTransfer::TYPE_DIVIDEND,$day_x);
            $tr->transfer($fee,"-",UserTransfer::TYPE_DIVIDEND_FEE,$day_x);

            if($user->div_comp){
                $deposit = new Deposit();
                $deposit->type = Deposit::TYPE_DIVIDEND;
                $deposit->status = Deposit::STATUS_PAYED;
                $deposit->user_id = $user->id;
                $deposit->sum = $div;
                $deposit->payed_at = $day_x;
                $deposit->saveQuietly();
            }

        });


    }
}
