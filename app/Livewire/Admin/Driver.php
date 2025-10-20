<?php

namespace App\Livewire\Admin;

use App\Models\driver as ModelsDriver;
use Livewire\Component;

class Driver extends Component
{
    public $name, $birthdate, $address, $contact_number, $license_number, $license_expiration, $photo;

    public function DriverSave()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'license_number' => 'required|string|unique:drivers,license_number',
            'license_expiration' => 'nullable|date',
            'photo' => 'nullable|image|max:2048',
        ], [
            'required' => 'This field is required.',
            'unique' => 'This license number already exists.',
            'image' => 'The photo must be an image file.',
        ]);
    
        $driver = new ModelsDriver();
        $driver->name = $this->name;
        $driver->birthdate = $this->birthdate;
        $driver->address = $this->address;
        $driver->contact_number = $this->contact_number;
        $driver->license_number = $this->license_number;
        $driver->license_expiration = $this->license_expiration;
        $driver->save();
    
        $this->reset([
            'name',
            'birthdate',
            'address',
            'contact_number',
            'license_number',
            'license_expiration',
            'photo',
        ]);
        $this->showToastr('Driver information successfully saved.', 'success');
    }
    
    
    
    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }


    public function render()
    {
        $drivers = ModelsDriver::all();
        return view('livewire.admin.driver', [
            'drivers' => $drivers,
        ]);
    }
    
}
