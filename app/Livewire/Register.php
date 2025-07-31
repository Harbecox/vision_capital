<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    public $step = 1;
    public $w = 20;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $phone;
    public $email;
    public $ss_dl;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $country;

    public $username;
    public $password;
    public $password_confirmation;

    public $secret_question;
    public $secret_answer;

    public $month;
    public $day;
    public $year;

    public $years = [];
    public $months = [];
    public $days = [];

    function mount(){
        for($i = Carbon::now()->subYears(18)->year;$i > 1900 ;$i--){
            $this->years[] = $i;
        }
        $start = Carbon::now()->startOfYear();
        for($i=0;$i<12;$i++){
            $this->months[$start->month] = $start->monthName;
            $start->addMonth();
        }
    }

    public function render()
    {
        if($this->month){
            $start = Carbon::now()->setMonth($this->month);
            for($i = 1;$i <= $start->daysInMonth;$i++){
                $this->days[] = $i;
            }
        }
        if($this->step == 4){
            $this->dispatch("reg_captcha");
        }
        return view('livewire.register');
    }

    function register(){
        $bday = $this->year."-".$this->month."-".$this->day;
        $user = User::create([
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "middle_name" => $this->middle_name,
            "phone" => $this->phone,
            "email" => $this->email,
            "ss_dl" => $this->ss_dl,
            "address" => $this->address,
            "city" => $this->city,
            "state" => $this->state,
            "zip" => $this->zip,
            "country" => $this->country,
            "birth_day" => $bday,
            "password" => $this->password,
            "username" => $this->username,
            "secret_question" => $this->secret_question,
            "secret_answer" => $this->secret_answer
        ]);
        event(new Registered($user));
    }


    function next(){
        if($this->step == 2){
            $this->validate([
                'first_name' => ['required', 'string'],
                'middle_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

        }
        if($this->step == 3){

            $this->validate([
                'username' => ['required', 'string'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
//            dd($this->first_name);
        }
//        if($this->step == 4){
//            $this->validate([
//                'g-recaptcha-response' => 'required|recaptcha',
//            ]);
//        }

        $this->step++;
        if($this->step == 5){
            $this->register();
        }
        $this->w += 20;
    }
}
