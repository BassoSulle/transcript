<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\Course;
use App\Models\Result;
use App\Models\Student;
use Livewire\Component;

class StudentsTranscriptsList extends Component
{
    public $stu_reg_no;
    
    public function checkStudentResults($stu_reg_no) {
        if($stu_reg_no) {
            $this->stu_reg_no = $stu_reg_no;
            
            $stu_results = Result::where('student_reg_no', $this->stu_reg_no)->get();

            if(count($stu_results) != 0) {
                return redirect()->route('lecturer.student_transcript', ['student' => $this->stu_reg_no]);                

            } else {
                $this->dispatchBrowserEvent('message_alert', 'Students results are not available');

            }
        }
    }

    public function render()
    {
        $students = Student::latest()->paginate(10);
        $courses=Course::all();

        return view('livewire.lecturer.students-transcripts-list', [
            'students' => $students,
            'courses' => $courses,
        ]);
    }
}