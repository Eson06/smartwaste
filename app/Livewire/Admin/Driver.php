<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\driver as ModelsDriver;
use App\Models\User;
use App\Models\user_role;
use Livewire\Component;

class Driver extends Component
{
    public $name, $birthdate, $address, $contact_number, $license_number, $license_expiration, $photo;
    public $user_name, $password;

    

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
            'user_name' => 'required|string|unique:users,user_name',
            'password' => 'required|string|min:6',
        ], [
            'required' => 'This field is required.',
            'unique' => 'This :attribute already exists.',
            'image' => 'The photo must be an image file.',
        ]);
    
        // ✅ Create new user record
        $newdriver = new User();
        $newdriver->name = $this->name;
        $newdriver->user_name = $this->user_name;
        $newdriver->password = Hash::make($this->password); // securely hash password
        $newdriver->save();

        // ✅ Create new user_role
        $newduserrole = new user_role();
        $newduserrole->user_id = $newdriver->id;
        $newduserrole->role_id = 3;
        $newduserrole->save();
    
        // ✅ Create new driver record
        $driver = new ModelsDriver();
        $driver->user_id = $newdriver->id; // link to the created user
        $driver->name = $this->name;
        $driver->birthdate = $this->birthdate;
        $driver->address = $this->address;
        $driver->contact_number = $this->contact_number;
        $driver->license_number = $this->license_number;
        $driver->license_expiration = $this->license_expiration;
    
        // ✅ Save photo if uploaded
        if ($this->photo) {
            $photoName = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('photos', $photoName, 'public');
            $driver->photo = $photoName;
        }
    
        $driver->save();
    
        // ✅ Reset form fields
        $this->reset([
            'name',
            'birthdate',
            'address',
            'contact_number',
            'license_number',
            'license_expiration',
            'photo',
            'user_name',
            'password',
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
