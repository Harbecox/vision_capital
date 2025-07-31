<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Settings;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\AccountApproveNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    function index(){
        Paginator::useBootstrap();
        $query = User::query()->with("bank_profile");
        if(\request()->has("name") && strlen(\request()->get("name")) > 0){
            $name = \request()->get("name");
            $name = str_replace("  "," ",$name);
            $parts = explode(" ",$name);
            $query = $query->whereRaw('CONCAT(first_name," ",last_name) LIKE "'.$name.'%"');
            foreach ($parts as $p){
                $query = $query->orWhere("first_name","LIKE",$p."%");
                $query = $query->orWhere("last_name","LIKE",$p."%");
            }
        }

        if(\request()->has("account")){
            $query = $query->where("account","LIKE",\request()->get("account")."%");
        }

        $dates = Settings::get("x-date");
        $now = Carbon::now();
        $m = $now->month - 2;
        $index = $m >= 0 ? $m : 12 + $m;
        $x_date = $dates[$index];
        $data['is_x_date'] = Carbon::make($now->toDateString())->equalTo(Carbon::make($x_date));

        $data['banks'] = BankAccount::all();
        $data['users'] = $query->orderByDesc("created_at")->paginate(50);
        return view("admin.users.index",$data);
    }

    function save($id,Request $request){
        $user = User::find($id);
        $user->bank = $request->boolean("bank");
        $user->check = $request->boolean("check");
        $bank_id = $request->integer("bank_id");
        $user->bank_id = $bank_id > 0 ? $bank_id : null;
        $user->save();
        return response()->json(true);
    }

    function save_dc($id,Request $request){
        $user = User::find($id);
        $user->div_comp = $request->boolean("div_comp");
        $user->save();
        return response()->json(true);
    }

    function approve($id){
        $user = User::find($id);
        $user->approved = true;
        $user->save();
        $user->notify(new AccountApproveNotification());
        return back();
    }
	function deleteUser($id,Request $request){
        $user = User::find($id);
		$user->delete();
        return back();
    }

    function deleteTransaction($tr_id){
        $transaction = Transfer::find($tr_id);
        if($transaction->type == Transfer::TYPE_DEPOSIT){
            Deposit::query()->where("id",$transaction->object_id)->delete();
        }elseif ($transaction->type == Transfer::TYPE_WITHDRAWAL){
            Withdrawal::query()->where("id",$transaction->object_id)->delete();
        }
        $transaction->delete();
        return back();
    }
	
	
}
