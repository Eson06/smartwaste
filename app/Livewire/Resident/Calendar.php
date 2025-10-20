<?php

namespace App\Livewire\Resident;

use Livewire\Component;
use App\Models\driver as ModelsDriver;
use App\Models\schedule as ModelsSchdecule;

class Calendar extends Component
{

    public function render()
    {
        $schdecules = ModelsSchdecule::all();
        $drivers = ModelsDriver::all();
        return view('livewire.resident.calendar', [
            'drivers' => $drivers,
            'schdecules' => $schdecules,
        ]);
    }
}
