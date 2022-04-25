<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Complain;

class ComplainReport extends Component
{
    public function read(){
        return Complain::all();
    }

    public function render()
    {
        return view('livewire.complain-report', [
            'data' => $this->read(),
        ])->layout('layouts.base');
    }
}
