<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Settings;
use App\Helper\UserBalance;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Fee;
use App\Models\Transfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class InterestController extends Controller
{
    function index(){
        Paginator::useBootstrap();
        $div_prc = Settings::get("d-prc");
        $data['div'] = $div_prc;

        $data['users'] = User::all()->map(function ($user){
            $ub = UserBalance::make($user);
            $user['fee'] = $ub->getFee();
            $intervals = $ub->getIntervals();
            $user['intervals'] = $intervals['intervals'];
            $user['total'] = $intervals['total'];
            return $user;
        });

        return view("admin.interest.index",$data);
    }

    function update(Request $request){
        Settings::set("d-prc",$request->get("prc"));
        return back();
    }

    function simulate_day_x(){
        $xday = UserBalance::getxDay();
        foreach (User::all() as $user){
            $intervals = $user->balance->getIntervals();
            if($intervals['total']['div'] > 0){
                if($user->div_comp){
                    $d = new Deposit();
                    $d->user_id = $user->id;
                    $d->type = Deposit::TYPE_DIVIDEND;
                    $d->sum = $intervals['total']['div'] - $intervals['total']['fee'];
                    $d->status = Deposit::STATUS_PAYED;
                    $d->payed_at = $xday;
                    $d->fee = $intervals['total']['fee'];
                    $d->save();
                }else{
                    $t = new Transfer();
                    $t->user_id = $user->id;
                    $t->sum = $intervals['total']['div'];
                    $t->created_at = $xday;
                    $t->fee = $intervals['total']['fee'];
                    $t->type = Transfer::TYPE_DIVIDEND;
                    $t->name = Transfer::NAME_DIVIDEND;
                    $t->object_id = 0;
                    $t->save();
                }
            }
        }
//        Artisan::call("day-x");
        return back();
    }
}
