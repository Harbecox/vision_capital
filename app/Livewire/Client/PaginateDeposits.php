<?php

namespace App\Livewire\Client;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\WithPagination;

class PaginateDeposits extends Component
{
    use WithPagination;
    public function render()
    {
        $data['deposits'] = Deposit::paginate(10);

        return view('livewire.client.paginate-deposits',$data);
    }
}
