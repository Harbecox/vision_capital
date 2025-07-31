<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBankRequest;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['banks'] = BankAccount::all();
        $data['check'] = Settings::get("check");
        return view("admin.bank.index",$data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.bank.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminBankRequest $request,BankAccount $bank)
    {

        $bank->profile = $request->input('profile');
        $bank->name = $request->input('name');
        $bank->address = $request->input('address');
        $bank->beneficiary = $request->input('beneficiary');
        $bank->account = $request->input('account');
        $bank->r_aba = $request->input('r_aba');
        $bank->swift = $request->input('swift');
        $bank->save();

        return to_route('admin.bank.edit',$bank);

    }

    public function checkInfo(Request $request)
    {
        Settings::set("check",$request->except("_token"));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['bank'] = BankAccount::find($id);

        return view("admin.bank.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
