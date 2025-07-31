<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\DepositController;
use App\Http\Controllers\Client\SettingsController;
use App\Http\Controllers\Client\WithdrawalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[\App\Http\Controllers\Client\HomeController::class,'index'])->name('home');
Route::get('performance',function (){
    return redirect()->route('home');
});
Route::get('growth_fund',function (){
    return redirect()->route('home');
});
Route::get('about_us',function (){
    return redirect()->route('home');
});
Route::get('contact_us',function (){
    return redirect()->route('home');
});
Route::get('cookies',[\App\Http\Controllers\Client\HomeController::class,'cookies'])->name('cookies');
Route::get('terms',[\App\Http\Controllers\Client\HomeController::class,'terms'])->name('terms');
Route::get('privacy',[\App\Http\Controllers\Client\HomeController::class,'privacy'])->name('privacy');
//Route::post('client_contact_us',[\App\Http\Controllers\Client\ContactUsController::class,'index'])->name('client.contact_us');
Auth::routes(['verify' => true]);

Route::get("register",function (){
    return response()->redirectToRoute("register.step",1);
})->name("register");
Route::group(['prefix' => 'register','as' => "register."],function (){

    Route::get("{step}",[\App\Http\Controllers\Auth\RegisterController::class,"step"])->name("step");
    Route::post("{step}",[\App\Http\Controllers\Auth\RegisterController::class,"step_post"])->name("step.post");
});
Route::get("register/success",[\App\Http\Controllers\Auth\RegisterController::class,"success"])->name("register.success");
Route::get("not_approved",[\App\Http\Controllers\Auth\RegisterController::class,"not_approved"])->name("auth.not_approved");

Route::group(['prefix' => 'dashboard',"middleware" => ['auth:web','approved'],'as' => "dashboard."],function (){
    Route::get("/",[DashboardController::class,"index"])->name("index");
    Route::get("/div_comp",[DashboardController::class,"div_comp"])->name("comp");
    Route::group(['prefix' => "deposits",'as' => "deposits."],function (){
        Route::get("/",[DepositController::class,"index"])->name("index");
        Route::get("create",[DepositController::class,"create"])->name("create");
    });
    Route::group(['prefix' => "withdrawals",'as' => "withdrawals."],function (){
        Route::get("/",[WithdrawalController::class,"index"])->name("index");
        Route::get("create",[WithdrawalController::class,"create"])->name("create");
    });
    Route::group(['prefix' => "settings",'as' => "settings."],function (){
        Route::get("/",[SettingsController::class,"index"])->name("index");
        Route::post("/",[SettingsController::class,"update"])->name("update");
        Route::post("/password",[SettingsController::class,"password_update"])->name("password_update");
    });
});

Route::get("admin/login",[\App\Http\Controllers\Auth\AdminLoginController::class,"showLoginForm"])->name("admin.login");
Route::post("admin/login",[\App\Http\Controllers\Auth\AdminLoginController::class,"login"]);
Route::group(['prefix' => 'admin','middleware' => 'auth:admin','as' => 'admin.'],function (){
    Route::get("/",function (){ return response()->redirectToRoute("admin.users.index"); })->name("index");

    Route::group(['prefix' => 'users','as' => 'users.'],function () {
        Route::get("/", [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name("index");
        Route::post("/{id}", [\App\Http\Controllers\Admin\UsersController::class, 'save'])->name("save");
        Route::post("/{id}/dc", [\App\Http\Controllers\Admin\UsersController::class, 'save_dc'])->name("save_dc");
        Route::get("/{id}/approve", [\App\Http\Controllers\Admin\UsersController::class, 'approve'])->name("approve");
		Route::get("/{id}/delete", [\App\Http\Controllers\Admin\UsersController::class, 'deleteUser'])->name("delete");
        Route::get("delete_transaction/{tr_id}",[\App\Http\Controllers\Admin\UsersController::class,"deleteTransaction"])->name("delete_transaction");
    });

    Route::group(['prefix' => 'deposits','as' => 'deposits.'],function () {
        Route::get("/",[\App\Http\Controllers\Admin\DepositsController::class,'index'])->name("index");
        Route::put("/update/{id}",[\App\Http\Controllers\Admin\DepositsController::class,'update'])->name("update");
        Route::post("/store",[\App\Http\Controllers\Admin\DepositsController::class,'store'])->name("store");
        Route::post("/payed_at/{id}",[\App\Http\Controllers\Admin\DepositsController::class,"changePayedAt"])->name("update_payed_at");
		Route::get("/{id}/deletedeposit", [\App\Http\Controllers\Admin\DepositsController::class, 'deletedeposit'])->name("deletedeposit");
    });

    Route::group(['prefix' => 'withdrawals','as' => 'withdrawals.'],function () {
        Route::get("/",[\App\Http\Controllers\Admin\WithdrawalsController::class,'index'])->name("index");
        Route::put("update/{id}",[\App\Http\Controllers\Admin\WithdrawalsController::class,'update'])->name("update");
        Route::post("store",[\App\Http\Controllers\Admin\WithdrawalsController::class,'store'])->name("store");
    });

    Route::resource("bank",\App\Http\Controllers\Admin\BankController::class);
    Route::post('bank/check',[\App\Http\Controllers\Admin\BankController::class,'checkInfo'])->name('bank.check');

    Route::group(['prefix' => 'interest','as' => 'interest.'],function () {
        Route::get("/",[\App\Http\Controllers\Admin\InterestController::class,'index'])->name("index");
        Route::put("update",[\App\Http\Controllers\Admin\InterestController::class,'update'])->name("update");
        Route::get("simulate",[\App\Http\Controllers\Admin\InterestController::class,'simulate_day_x'])->name("simulate");
//        Route::post("store",[\App\Http\Controllers\Admin\WithdrawalsController::class,'store'])->name("store");
    });

    Route::group(['prefix' => 'settings','as' => 'settings.'],function (){

        Route::get("/",[\App\Http\Controllers\Admin\SettingsController::class,"index"])->name("index");
        Route::put("/",[\App\Http\Controllers\Admin\SettingsController::class,"index_update"])->name("index.update");

        Route::post("id",[\App\Http\Controllers\Admin\SettingsController::class,"save_id"])->name("id");

        Route::get("email",[\App\Http\Controllers\Admin\SettingsController::class,"email"])->name("email.index");
        Route::put("email",[\App\Http\Controllers\Admin\SettingsController::class,"email_update"])->name("email.update");

        Route::get("fee",[\App\Http\Controllers\Admin\SettingsController::class,"fee"])->name("fee.index");
        Route::put("fee",[\App\Http\Controllers\Admin\SettingsController::class,"fee_update"])->name("fee.update");

        Route::get("password",[\App\Http\Controllers\Admin\SettingsController::class,"password"])->name("password.index");
        Route::put("password",[\App\Http\Controllers\Admin\SettingsController::class,"password_update"])->name("password.update");
    });

    Route::get("log",[\App\Http\Controllers\Admin\LogController::class,'index'])->name('log.index');
    Route::get("log/banned",[\App\Http\Controllers\Admin\LogController::class,'banned_list'])->name('log.banned_list');
    Route::get("log/{log}/ban",[\App\Http\Controllers\Admin\LogController::class,'ban'])->name('log.ban');
    Route::get("log/{log}/unban",[\App\Http\Controllers\Admin\LogController::class,'unban'])->name('log.unban');
    Route::get("log/{ip}/unban_from_ban_list",[\App\Http\Controllers\Admin\LogController::class,'unban_from_ban_list'])->name('log.unban_from_ban_list');
    Route::post("log/ban-ip",[\App\Http\Controllers\Admin\LogController::class,'ban_ip'])->name('log.ban.ip');
});
