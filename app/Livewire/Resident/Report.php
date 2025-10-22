<?php

namespace App\Livewire\Resident;

use App\Models\report as ModelsReport;
use Livewire\Component;
use Livewire\WithFileUploads;

class Report extends Component
{

    public $user_id, $date, $title, $message, $attachment;
    use WithFileUploads;


    public function reportSave()
    {
        $this->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // optional file upload
        ], [
            'required' => 'This field is required.',
            'file' => 'Invalid file format.',
            'max' => 'Attachment must not exceed 2MB.',
        ]);
    
        // Handle file upload if attachment is provided
        $attachmentPath = null;
        if ($this->attachment) {
            $attachmentPath = $this->attachment->store('attachments', 'public');
        }
    
        // Create and save report
        $report = new ModelsReport();
        $report->user_id = auth('web')->user()->id;
        $report->date = $this->date;
        $report->title = $this->title;
        $report->message = $this->message;
        $report->attachment = $attachmentPath;
        $report->save();
    
        // Reset form fields
        $this->reset([
            'date',
            'title',
            'message',
            'attachment',
        ]);
    
        $this->showToastr('Report successfully saved.', 'success');
    }
    
    
        
        
        
        public function showToastr($message, $type) {
            return $this->dispatch('showToastr',   message: $message, type: $type);
        }
        

        public function render()
        {
            $reports = ModelsReport::where('user_id', auth('web')->user()->id)
                ->latest()
                ->get();
        
            return view('livewire.resident.report', [
                'reports' => $reports,
            ]);
        }
        
        
}
