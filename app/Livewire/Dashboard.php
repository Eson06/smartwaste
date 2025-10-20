<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.dashboard');
    }
}
