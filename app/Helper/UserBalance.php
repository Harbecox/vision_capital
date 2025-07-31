<?php

namespace App\Helper;

use App\Models\Fee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class UserBalance
{
    private User $user;

    function __construct($user)
    {
        $this->user = $user;
    }

    static function make($user): UserBalance
    {
        return new UserBalance($user);
    }

    function available() : float{
        return $this->user->transfer->available();
    }

    function total(): float{
        return $this->user->transfer->total();
    }


    static function getXMonth(): Carbon
    {
        $month = Carbon::now()->subMonth();
        return $month->startOfMonth();
    }

    static function getxDay(){
        $dates = Settings::get("x-date");
        $month = self::getXMonth()->month - 1;
        $month = $month < 0 ? 11 : $month;
        return $dates[$month];
    }

    function getFee(){
        $user_total = $this->user->balance->total();
        return Fee::query()->where("min","<=",$user_total)->where(function ($q) use ($user_total){
            $q->orWhere("max",">=",$user_total);
            $q->orWhereNull("max");
        })->first()->prc ?? Fee::query()->first()->prc;
    }



    function getIntervals(){
        $month = self::getXMonth();
        $div_prc = Settings::get("d-prc");
        $prc_day = $div_prc / $month->daysInMonth;
        $user_fee = $this->getFee();
        $intervals = $this->user->transfer->totalByMonth($month);
        $total = [
            'div' => 0,
            'fee' => 0
        ];
        foreach ($intervals as &$interval){
            $interval['div'] = round($interval['days'] * $prc_day * ( $interval['amount'] / 100),2);
            $interval['fee'] = $user_fee * ($interval['div'] / 100);
            $interval['interval'] = $interval['start'] ." - ".$interval['end'];
            $total['div'] += $interval['div'];
            $total['fee'] += $interval['fee'];
        }

        return [
            "intervals" => $intervals,
            "total" => $total
        ];
    }


}
