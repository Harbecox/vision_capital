<?php

namespace App\Http\Controllers\Client;

use App\Helper\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    function index()
    {
        $data['settings'] = Auth::user();
        $dates = Settings::get("x-date");
        $now = Carbon::now();
        $m = $now->month - 2;
        $index = $m >= 0 ? $m : 12 + $m;
        $x_date = $dates[$index];
        $data['is_x_date'] = Carbon::make($now->toDateString())->equalTo(Carbon::make($x_date));
        $data['settings']['can_change'] = true;
        return view("client.settings.index", $data);
    }

    function update(Request $request)
    {

        $user = Auth::user();
        $user->email = $request->get('email');
        $user->username = $request->get("username");
        $user->save();

        $user->info()->update([
            "address" => $request->get("address"),
            "zip" => $request->get("zip"),
            "state" => $request->get("state"),
            "phone" => $request->get("phone"),
            "email" => $request->get('email'),
        ]);



        return back()->with(['success_info' => 'Data was updated successfully']);
    }

    function password_update(Request $request)
    {

        $request->validate([
            "password" => ['required'],
            "new_password" => ['required', 'confirmed', 'min:8'],
        ]);
        if (!Hash::check($request->get("password"), Auth::user()->password)) {
            return back()->withErrors(['password' => 'Password is wrong']);
        }
        Auth::user()->password = Hash::make($request->get("new_password"));
        return back()->with(['success_password' => 'Password was updated successfully']);
    }
}
