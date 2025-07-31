<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Settings;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\Fee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    function index(){
        Paginator::useBootstrap();
        $dates = collect(Settings::get("x-date"));
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return view("admin.settings.index",['dates' => $dates,'months' => $months]);
    }

    function index_update(Request $request){
        Settings::set("x-date",$request->get("date"));
        return back();
    }

    function save_id(Request $request){
        Settings::set("acc_start_num",$request->get("id",false));
        return back();
    }

    function email(){
        $data['emails'] = EmailTemplate::query()->get();
        $data['html'] = Settings::get("register_success_html");
        $data['admin_email'] = Settings::get("admin_email");
        return view("admin.settings.email",$data);
    }

    function email_update(Request $request){
        foreach ($request->get("content") as $name => $content){
            EmailTemplate::query()->where("name",$name)->update(['content' => $content]);
        }
        Settings::set("register_success_html",$request->get("html"));
        Settings::set("admin_email",$request->get("admin_email"));
        return back();
    }

    function fee(){
        $data['fees'] = Fee::all();
        return view("admin.settings.fee",$data);
    }

    function fee_update(Request $request){
        $min = $request->get("min");
        $max = $request->get("max");
        $prc = $request->get("prc");
        foreach ($min as $id => $value){
            Fee::query()->where("id",$id)->update([
                "min" => $min[$id],
                "max" => $max[$id],
                "prc" => $prc[$id],
            ]);
        }
        return back();
    }

    function password(){
        $data = [];
        return view("admin.settings.password",$data);
    }

    function password_update(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Проверка совпадения старого пароля
        if (!Hash::check($request->get("old_password"), Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'password is wrong']);
        }

        // Обновление пароля
        Auth::user()->update([
            'password' => $request->get("password"),
        ]);

        return back()->with(['success' => 'Password has been changed']);
    }
}
