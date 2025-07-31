<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannedIp;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class LogController extends Controller
{
    function index(){
        Paginator::useBootstrap();
        $query = User::query();
        $q = false;
        if(\request()->has("name") && strlen(\request()->get("name")) > 0){
            $q = true;
            $name = \request()->get("name");
            $name = str_replace("  "," ",$name);
            $parts = explode(" ",$name);
            $query = $query->whereRaw('CONCAT(first_name," ",last_name) LIKE "'.$name.'%"');
            foreach ($parts as $p){
                $query = $query->orWhere("first_name","LIKE",$p."%");
                $query = $query->orWhere("last_name","LIKE",$p."%");
            }
        }

        if(\request()->has("account") && strlen(\request()->get("account")) > 0){
            $q = true;
            $query = $query->where("account","LIKE",\request()->get("account")."%");
        }

        if($q){
            $user_ids = $query->get()->map(function ($user){
                return $user->id;
            })->toArray();
            $data['logs'] = UserLog::query()->whereIn("user_id",$user_ids)->with("user")->orderByDesc("created_at")->paginate(30);
        }else{
            if(\request()->has("ip") && strlen(\request()->get("ip")) > 0){
                $data['logs'] = UserLog::query()->where("ip",\request()->get("ip"))->with("user")->orderByDesc("created_at")->paginate(30);
            }else{
                $data['logs'] = UserLog::query()->with("user")->orderByDesc("created_at")->paginate(30);
            }

        }


        return view("admin.log.index",$data);
    }

    function ban(UserLog $log){
        BannedIp::create([
            "ip" => $log->ip
        ]);
        return back();
    }

    function unban(UserLog $log)
    {
        BannedIp::query()->where('ip',$log->ip)->first()?->delete();
        return back();
    }
    function ban_ip(Request $request,BannedIp $ip)
    {
        $ip = $request->get('ip_address');
        BannedIp::create([
            'ip' => $ip
        ]);
        return back();
    }

    function unban_from_ban_list(BannedIp $ip)
    {
        $ip->delete();
        return back();
    }

    function banned_list(){
        $list = BannedIp::query();
        if(\request()->has("ip") && strlen(\request()->get("ip")) > 0){
            $ip = \request()->get("ip");
            $list = $list->where("ip",'LIKE',$ip.'%');
        }
        $data['list'] = $list->paginate(50);
        return view('admin.log.banned_list',$data);
    }
}
