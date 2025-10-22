<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public $testing = 'Hello from Livewire!';

    
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
