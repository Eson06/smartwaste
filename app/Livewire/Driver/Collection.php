<?php

namespace App\Livewire\Driver;

use App\Models\trash_collection;
use Livewire\Component;

class Collection extends Component
{
    public $collection_date, $collection_barangay, $collection_kilogram, $collection_type, $collection_driver;
    
    public function storecollection()
    {
        $this->validate([
            'collection_date' => 'required',
            'collection_barangay' => 'required',
            'collection_kilogram' => 'required',
            'collection_type' => 'required',
        ], [
            'required' => 'This field is required.',
        ]);
    
        $tc = new trash_collection();
        $tc->collection_date = $this->collection_date;
        $tc->collection_barangay = $this->collection_barangay;
        $tc->collection_kilogram = $this->collection_kilogram;
        $tc->collection_type = $this->collection_type;
        $tc->collection_driver = auth('web')->user()->id;
        $tc->save();
        $this->reset(['collection_date', 'collection_barangay', 'collection_kilogram', 'collection_type']);
        $this->showToastr('Trash Collection Successfully Submitted.', 'success');
    }
    
    
    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }

    public function render()
    {
        return view('livewire.driver.collection');
    }
}
