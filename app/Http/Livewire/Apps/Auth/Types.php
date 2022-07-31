<?php

namespace App\Http\Livewire\Apps\Auth;

use Livewire\Component;

class Types extends Component
{
    public $auth_type;

    public function mount()
    {
      $this->auth_type = 'basic';

    }

    public function render()
    {
        return view('livewire.apps.auth.types');
    }
}
