<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public $editProfileModal = false;

    protected $listeners = ['editEmit'];

    public function editEmit(){
        $editProfileModal = true;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
