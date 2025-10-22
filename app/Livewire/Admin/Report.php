<?php

namespace App\Livewire\Admin;

use App\Models\report as ModelsReport;
use Livewire\Component;

class Report extends Component
{
    public function render()
    {
        $reports = ModelsReport::all();
        return view('livewire.admin.report', [
            'reports' => $reports,
        ]);
    }
}
