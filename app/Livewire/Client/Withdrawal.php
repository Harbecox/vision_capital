<?php

namespace App\Livewire\Client;

use App\Helper\Sum;
use App\Rules\AvailableBalance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Withdrawal extends Component
{
    public int $step = 0;

    public string $type = "";

    public string $sum = "";

    public float $fee;

    public string $payee_name = "";
    public string $address = "";
    public string $city = "";
    public string $state = "";
    public string $zip = "";
    public string $country = "";
    public string $bank_name = "";
    public string $bank_address = "";
    public string $bank_account = "";
    public string $bank_aba = "";

    public function render()
    {
        $this->fee = $this->type == \App\Models\Withdrawal::TYPE_WIRE_TRANSFER ? 30 : 0;
        $data['available'] = Auth::user()->balance->available() - $this->fee;
        return view('livewire.client.withdrawal',$data);
    }

    function setType($type){
        $this->type = $type;
        $this->next();
    }

    function next(){

        if($this->step == 2) {
            $this->validate();
        }
        $this->step++;
        if($this->step == 3){

            $new_w = new \App\Models\Withdrawal();


            $new_w->type            = $this->type;
            $new_w->fee             = $this->fee;
            $new_w->sum             = Sum::clear($this->sum);
            $new_w->payee_name      = $this->payee_name;
            $new_w->address         = Auth::user()->info[0]->address;
            $new_w->city            = Auth::user()->info[0]->city;
            $new_w->state           = Auth::user()->info[0]->state;
            $new_w->zip             = Auth::user()->info[0]->zip;
            $new_w->country         = Auth::user()->info[0]->country;
            $new_w->bank_name       = $this->bank_name;
            $new_w->bank_address    = $this->bank_address;
            $new_w->bank_account    = $this->bank_account;
            $new_w->bank_aba        = $this->bank_aba;
            Auth::user()->withdrawals()->save($new_w);

            return response()->redirectToRoute("dashboard.withdrawals.index");
//            Auth::user()->balance->total      -= ($this->sum + $this->fee);
//            Auth::user()->balance->available  -= ($this->sum + $this->fee);
//            Auth::user()->balance->save();
        }
    }

    function back(){
        $this->step--;
    }

    public function rules(){
        $available = $this->type == \App\Models\Withdrawal::TYPE_WIRE_TRANSFER ? Auth::user()->balance->available() - 30 : Auth::user()->balance->available();
        $rules = [
            \App\Models\Withdrawal::TYPE_WIRE_TRANSFER => [
                'sum' => [
                    new AvailableBalance($available),
                    'required'
                ],
                "payee_name" => "required",
                "address" => "required",
                "bank_name" => "required",
                "bank_address" => "required",
                "bank_account" => "required",
                "bank_aba" => "required",
            ],
            \App\Models\Withdrawal::TYPE_CHECK => [
                'sum' => [
                    new AvailableBalance($available),
                    'required'
                ],
                "payee_name" => "required",
                "address" => "required",
            ],
        ];
        return $rules[$this->type];
    }
    public function openModal()
    {
        $this->step = 1;
        $this->sum = '';
    }


}
