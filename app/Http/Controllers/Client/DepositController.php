<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    function index(){
        $data['deposites'] = Auth::user()->deposites()->orderByDesc("created_at")->paginate(10);
        return view("client.deposits.index",$data);
    }

    function create(){
        return view("client.deposits.create");
    }
}
