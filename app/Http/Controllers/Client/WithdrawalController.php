<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    function index(){
        $user = Auth::user();
        $data['withdrawals'] = $user->withdrawals()->orderByDesc("created_at")->paginate(10);
        $data['balance'] = Auth::user()->balance;
        return view("client.withdrawal.index",$data);
    }

    function create(){
        return view("client.withdrawal.create");
    }
}
