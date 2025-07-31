<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Sum;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Livewire\Attributes\Rule;

class DepositsController extends Controller
{
    function index(){
        Paginator::useBootstrap();
        $data['deposits'] = Deposit::query()->orderByDesc("payed_at")->paginate(20);
        $data['users'] = User::query()->get()->keyBy("id")->map(function (User $user){
            return $user->first_name." ".$user->last_name." #".$user->account;
        })->toArray();
        return view("admin.deposits.index",$data);
    }

    function update($id,Request $request){
        $deposit = Deposit::find($id);
        $deposit->updated_at = $request->date("date");
        $deposit->payed_at = $request->date("date");
        $deposit->status = Deposit::STATUS_PAYED;
        $deposit->save();
        return back();
    }

    function changePayedAt($id,Request $request){
        $deposit = Deposit::find($id);
        $deposit->payed_at = $request->date("payed_at");
        $deposit->save();

        $tr = Transfer::query()->where("object_id",$deposit->id)->where("type",Transfer::TYPE_DEPOSIT)->first();
        $tr->created_at = $deposit->payed_at;
        $tr->save();
        return back();
    }
	
	function deletedeposit($id,Request $request){
        $user = Deposit::find($id);
		$user->delete();
        return back();
    }

    function store(Request $request){
        $request->validate([
            "type" => ['required',\Illuminate\Validation\Rule::in([Deposit::TYPE_CHECK,Deposit::TYPE_WIRE_TRANSFER])],
            "user_id" => ['required','exists:users,id'],
            "sum" => ['required','numeric','min:100'],
            "date" => ['required'],
        ]);
        $deposit = new Deposit();
        $deposit->status = Deposit::STATUS_PAYED;
        $deposit->type = $request->get("type");
        $deposit->user_id = $request->get("user_id");
        $deposit->sum = Sum::clear($request->get("sum"));
        $deposit->payed_at = $request->date("date");
        $deposit->save();
        return back();
    }

}
