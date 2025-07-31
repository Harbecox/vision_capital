<?php

namespace App\Livewire\Client;

use App\Helper\Settings;
use App\Helper\Sum;
use App\Models\BankAccount;
use App\Models\Deposit;
use App\Rules\AvailableBalance;
use App\Rules\DepositeLimit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Deposite extends Component
{
    public int $step = 0;

    public string $type = "";

    public string $sum = "";

    public float $fee;

    public $settings = [];
    public bool $show_first_step = true;

    public $check = [];
    public $bank = [];

    public $options = [];

    function mount(){
        if(Auth::user()->bank){

            $this->options['wire_transfer'] = 'Wire Transfer';
            $this->bank = Auth::user()->bank_profile->toArray();
        }
        $this->check = \App\Helper\Settings::get("check");
        if(Auth::user()->check){
            $this->options['check'] = 'Check';

        }
    }

    public function render()
    {
        $this->fee = $this->type == \App\Models\Withdrawal::TYPE_WIRE_TRANSFER ? 30 : 0;
//        $data['available'] = Auth::user()->balance->available() - $this->fee;
        $data['options'] = $this->options;
        return view('livewire.client.deposite',$data);
    }

    function setType($type){
        $this->type = $type;
        $this->next();
    }

    function next(){
        if($this->step == 1 || $this->step == 2){
            $this->validate();
        }
        $this->step++;
        if($this->step == 3){

            $this->settings = Settings::get("check");
            $dep = new Deposit();
            $dep->sum = Sum::clear($this->sum);
            $dep->type = $this->type;
            Auth::user()->deposites()->save($dep);
            $this->dispatch("refresh_deposit_list");
        }

    }

    function back(){
        $this->step--;
    }

    public function rules(){
        $r = [
            1 => [
                'type' => 'required'
            ],
            2 => [
                'sum' => [
                    'required',
                    new DepositeLimit
                ]
            ],
            3 => [

            ]
        ];

        return $r[$this->step];
    }
    public function openModal()
    {
        $this->step = 1;
        $this->sum = '';
    }

}
