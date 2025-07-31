<?php

namespace App\Helper;

use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\User;
use Carbon\Carbon;

class UserTransfer
{
    private User $user;

    function __construct($user)
    {
        $this->user = $user;
    }

    static function make($user){
        return new UserTransfer($user);
    }

    public function total($date = null) : float{
        $date = $date ? $date : Carbon::now();
        $sum = 0;
        $this->user->transfers()->where("created_at","<=",$date)->get()->map(function ($t) use (&$sum){
            if($t->type == Transfer::TYPE_WITHDRAWAL){
                $sum-=$t->sum;
            }else{
                $sum+=$t->sum;
            }
            $sum -= $t->fee;
        });
        return $sum;
    }

    public function available(){
        $deposits = Deposit::getFreezeDeposits($this->user);
        $sum = $deposits->sum("sum");
        return $this->total() - $sum;
    }

    public function totalByMonth(Carbon $month){
        $m = $month->month;
        $month_string = $month->format("Y-m-d");
        $month->endOfDay();

        $totals = [];

        while ($month->month == $m){
            $totals[] = $this->total($month);
            $month->addDay();
        }

        return $this->transformArray($totals,$month_string);
    }

    function transformArray($inputArray, $month_string) {
        $resultArray = [];
        $currentSum = null;
        $startDate = null;

        foreach ($inputArray as $index => $value) {
            if ($currentSum === null) {
                $currentSum = $value;
                $startDate = $index;
            } elseif ($value !== $currentSum) {
                $endDate = $index - 1;
                $days = $endDate - $startDate + 1; // Calculate the number of days
                $resultArray[] = [
                    'amount' => $currentSum,
                    'start' => date('d-m-Y', strtotime("$month_string +$startDate day")),
                    'end' => date('d-m-Y', strtotime("$month_string +$endDate day")),
                    'days' => $days,
                ];
                $currentSum = $value;
                $startDate = $index;
            }
        }

        // Add the last element
        if ($currentSum !== null) {
            $endDate = count($inputArray) - 1;
            $days = $endDate - $startDate + 1; // Calculate the number of days
            $resultArray[] = [
                'amount' => $currentSum,
                'start' => date('d-m-Y', strtotime("$month_string +$startDate day")),
                'end' => date('d-m-Y', strtotime("$month_string +$endDate day")),
                'days' => $days,
            ];
        }

        return $resultArray;
    }

}




