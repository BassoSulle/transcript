<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\Module;
use App\Models\Result;
use App\Models\Student;
use Livewire\Component;
use App\Models\course_semister_modules;

class StudentTranscript extends Component
{
    public $stu_reg_no, $student;

    public $semister_results = [];

    public function mount($student) {
        if($student) {
            $this->stu_reg_no = $student;
            
            $this->student = Student::where('registration_no', $this->stu_reg_no)->first();
            
            $student_modules = course_semister_modules::where('course_id', $this->student->course_id)->orderBy('semister_id', 'asc')->get();

            foreach($student_modules as $data) {
                $this->semister_results[$data->semister_id] = json_decode($data->module_ids);

            }

            // dd($this->semister_results);

            // dd($student_modules);
            // if($this->registration_status == false) {
                // $modules = Module::whereIn('id', json_decode($current_modules->module_ids))->get();
    
            // }

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