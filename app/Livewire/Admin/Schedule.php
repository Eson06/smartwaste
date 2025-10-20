<?php

namespace App\Livewire\Admin;
use App\Models\driver as ModelsDriver;
use App\Models\schedule as ModelsSchedule;
use Livewire\Component;

class Schedule extends Component
{
    public $driver_id, $barangay, $day;

    public function ScheduleSave()
{
    $this->validate([
        'driver_id' => 'required|exists:drivers,id',
        'barangay' => 'required|string|max:255',
        'day' => 'required|string|max:20',
    ], [
        'required' => 'This field is required.',
        'exists' => 'The selected driver does not exist.',
    ]);

    $schedule = new ModelsSchedule();
    $schedule->driver_id = $this->driver_id;
    $schedule->barangay = $this->barangay;
    $schedule->day = $this->day;
    $schedule->save();

    $this->reset([
        'driver_id',
        'barangay',
        'day',
    ]);

    $this->showToastr('Schedule successfully saved.', 'success');
}

    
    
    
    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }

    public function render()
    {
        $drivers = ModelsDriver::all();
        return view('livewire.admin.schedule', [
            'drivers' => $drivers,
        ]);
    }

}
