<?php

namespace App\Livewire\Client;

use App\Models\Transfer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Transfers extends Component
{
    use WithPagination;

    public $date = null;
    public $date_ = null;

    public function render()
    {
        $query = Auth::user()->transfers()->orderByDesc("created_at");
        if($this->date){
            $date = Carbon::createFromFormat('m/d/Y', $this->date);
            $query = $query->whereBetween("created_at",[$date->clone()->startOfDay(),$date->clone()->endOfDay()]);
        }

        $data['transfers'] = $query->orderByDesc("created_at")->paginate(10);

        return view('livewire.client.transfers',$data);
    }

    function search(){

        $this->date = $this->date_;
    }
}
