<?php

namespace App\Http\Controllers\Client;

use App\Helper\Settings;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index(){
        $data['balance'] = Auth::user()->balance;
        $dates = Settings::get("x-date");
        $m = Carbon::now()->month - 2;
        $index = $m >= 0 ? $m : 12 + $m;
        $x_date = $dates[$index];
        $data['comp'] = Auth::user()->div_comp;
        $data['is_x_date'] = Carbon::make(Carbon::now()->toDateString())->equalTo(Carbon::make($x_date));
        return view("client.dashboard",$data);
    }

    function div_comp(){
        $user = Auth::user();
        $user->div_comp = \request()->boolean("comp");
        $user->save();
        return back();
    }

}
