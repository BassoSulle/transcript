<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\Result;
use Livewire\Component;

class StudentTranscript extends Component
{
    public $stu_reg_no;

    public function mount($student) {
        if($student) {
            $this->stu_reg_no = $student;
            
            $stu_results = Result::where('student_reg_no', $this->stu_reg_no)->get();

            if(count($stu_results) != 0) {
                // dd($stu_results);

            } else {
                $this->dispatchBrowserEvent('message_alert', 'Module assigned successfully');

            }
        }
    }
    public function render()
    {
        return view('livewire.lecturer.student-transcript');
    }
}