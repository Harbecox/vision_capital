<?php

namespace App\Livewire\Client;

use App\Helper\Settings;
use App\Http\Requests\SettingsUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Compound extends Component
{

    public $com;

    public function render()
    {
        $data['settings'] = Auth::user();
        $dates = Settings::get("x-date");
        $m = Carbon::now()->month - 2;
        $index = $m >= 0 ? $m : 12 + $m;
        $x_date = $dates[$index];
        $this->com = $data['settings']['div_comp'];
        $data['is_x_date'] = Carbon::make(Carbon::now()->toDateString())->equalTo(Carbon::make($x_date));
        $data['settings']['can_change'] = true;

        return view('livewire.client.compound', $data);
    }

    public function show_modal(){
        $this->dispatch("show_compound_modal");
    }

    public function update()
    {
        $user = Auth::user();
        $user->div_comp = $this->com;
        $user->save();
    }


}
