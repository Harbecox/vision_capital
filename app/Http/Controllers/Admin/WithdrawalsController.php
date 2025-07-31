<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use App\Rules\AvailableBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class WithdrawalsController extends Controller
{
    function index(){
        Paginator::useBootstrap();
        $data['withdrawals'] = Withdrawal::query()->orderByDesc("payed_at")->paginate(20);
        $data['users'] = User::query()->get()->keyBy("id")->map(function (User $user){
            return $user->first_name." ".$user->last_name." #".$user->account;
        })->toArray();
        return view("admin.withdrawals.index",$data);
    }
    function update($id,Request $request){
        $withdrawals = Withdrawal::find($id);
        $withdrawals->payed_at = $request->date("date");
        $withdrawals->status = Withdrawal::STATUS_PAYED;
        $withdrawals->save();
        return back();
    }

    function store(Request $request){
        $request->validate([
            "type" => ['required',\Illuminate\Validation\Rule::in([Deposit::TYPE_CHECK,Deposit::TYPE_WIRE_TRANSFER])],
            "user_id" => ['required','exists:users,id'],
        ]);
        $available = User::find($request->get("user_id"))->balance->available;
        $request->validate([
            "sum" => new AvailableBalance($available)
        ]);
        $request->validate($this->getRules($request->get("type")));

        $withdrawal = new Withdrawal();
        $withdrawal->type = $request->get("type");
        $withdrawal->user_id = $request->get('user_id');
        $withdrawal->sum = $request->get('sum');
        $withdrawal->payee_name = $request->get('payee_name');
        $withdrawal->address = $request->get('address');
        $withdrawal->city = $request->get('city');
        $withdrawal->state = $request->get('state');
        $withdrawal->zip = $request->get('zip');
        $withdrawal->country = $request->get('country');

        if ($request->get("type") == Deposit::TYPE_WIRE_TRANSFER)
        {
            $withdrawal->fee = 30;
            $withdrawal->bank_name = $request->get('bank_name');
            $withdrawal->bank_address = $request->get('bank_address');
            $withdrawal->bank_account = $request->get('bank_account');
            $withdrawal->bank_aba = $request->get('bank_aba');

        }
        $withdrawal->status = Withdrawal::STATUS_PAYED;
        $withdrawal->payed_at = Carbon::now();
        $withdrawal->save();
        return back();
    }

    function getRules($type): array
    {
        $rules = [
            \App\Models\Withdrawal::TYPE_WIRE_TRANSFER => [
                "sum" => ['required','numeric','min:100'],
                "payee_name" => "required",
                "address" => "required",
                "city" => "required",
                "state" => "required",
                "zip" => "required",
                "country" => "required",
                "bank_name" => "required",
                "bank_address" => "required",
                "bank_account" => "required",
                "bank_aba" => "required",
            ],
            \App\Models\Withdrawal::TYPE_CHECK => [
                "sum" => ['required','numeric','min:100'],
                "payee_name" => "required",
                "address" => "required",
                "city" => "required",
                "state" => "required",
                "zip" => "required",
                "country" => "required",
            ]
        ];
        return $rules[$type];
    }
}
