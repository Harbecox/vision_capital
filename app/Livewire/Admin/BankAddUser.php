<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class BankAddUser extends Component
{
    public $users = [];

    public $bank_users = [];

    public $bank_id;

    public $selected_id = null;

    public function render()
    {
        $this->users = User::query()->whereNull("bank_id")->get()->keyBy("id")->map(function (User $user){
            return $user->first_name." ".$user->last_name." #".$user->account;
        })->toArray();
        $this->bank_users = User::query()->where("bank_id",$this->bank_id)->get();
        return view('livewire.admin.bank-add-user');
    }

    function removeUser($id){
        $user = User::find($id);
        $user->bank_id = null;
        $user->save();
    }

    function addUser(){
        $id = intval($this->selected_id);
        if($id > 0){
            $user = User::find($id);
            $user->bank_id = $this->bank_id;
            $user->save();
        }
    }
}
