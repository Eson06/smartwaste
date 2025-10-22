<?php

namespace App\Livewire\Driver;

use App\Models\driver;
use Livewire\Component;

class Schedule extends Component
{

    public function render()
    {
        $drivers = driver::all();
        return view('livewire.driver.schedule', [
            'drivers' => $drivers,
        ]);
    }
}
