<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Module;
use App\Models\Result;
use Livewire\Component;
use App\Models\student_module;
use App\Models\lecturer_module;
use App\Models\course_semister_modules;

class StudentsResultsList extends Component
{
    public $course_id, $module_id, $module, $module_code, $stu_registration_no;

    public $students_enrolled = [];

    public $stu_c_a_marks = [];
    
    public $stu_f_e_marks = [];

    public $total_marks = [];

    public $grade_ids = [];

    public $grade_names = [];

    public $student_enrolled_count = 0;
    
    public function calculateTotalMarks($stu_registration_no) {

        $sum = intval($this->stu_c_a_marks[$stu_registration_no] ?? 0) + intval($this->stu_f_e_marks[$stu_registration_no] ?? 0);

        $this->total_marks[$stu_registration_no] = $sum;

        $grade = Grade::where('low_marks', '<=', $this->total_marks[$stu_registration_no])
                ->where('high_marks', '>=', $this->total_marks[$stu_registration_no])
                ->first();


            if ($grade) {
                $this->grade_ids[$stu_registration_no] = $grade->id;
                $this->grade_names[$stu_registration_no] = $grade->name;

            } 
            // else {

            //     // Handle the case when no grade is found for the total marks

            // }
 
        return $sum;
        
    }
    
    public function saveStudentResults($stu_registration_no) {
        $this->stu_registration_no = $stu_registration_no;

        if(count($this->stu_c_a_marks) != 0 && count($this->stu_f_e_marks) != 0) {

            if(!empty($this->stu_c_a_marks[$this->stu_registration_no]) && !empty($this->stu_f_e_marks[$this->stu_registration_no])) {

                $check_student_results = Result::where('module_code', $this->module->code)->where('student_reg_no', $this->stu_registration_no)->get();

                if(count($check_student_results) != 0) {

                    $stu_module_results_update = Result::where('module_code', $this->module->code)->where('student_reg_no', $this->stu_registration_no)->update([
                        'c_a_marks' => $this->stu_c_a_marks[$this->stu_registration_no],
                        'f_e_marks' => $this->stu_f_e_marks[$this->stu_registration_no],
                        'total_marks' => $this->total_marks[$this->stu_registration_no],
                        'grade_id' => $this->grade_ids[$this->stu_registration_no],
                    ]);
    
                    if($stu_module_results_update) {
                        $this->clearForm();
                        $this->dispatchBrowserEvent('success_alert', 'Student\'s CA and FE updated successfully');
            
                    } else {
                        $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
                        
                    }


                } else {
                    
                    $stu_module_results = Result::create([
                        'student_reg_no' => $this->stu_registration_no,
                        'module_code' => $this->module->code,
                        'c_a_marks' => $this->stu_c_a_marks[$this->stu_registration_no],
                        'f_e_marks' => $this->stu_f_e_marks[$this->stu_registration_no],
                        'total_marks' => $this->total_marks[$this->stu_registration_no],
                        'grade_id' => $this->grade_ids[$this->stu_registration_no],
                        'staff_id' => auth()->user()->id,
                    ]);
    
                    if($stu_module_results) {
                        $this->clearForm();
                        $this->dispatchBrowserEvent('success_alert', 'Student\'s CA and FE saved successfully');
            
                    } else {
                        $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
                        
                    }

                }            

            } else {
                $this->dispatchBrowserEvent('message_alert', 'Please enter Both Student\'s CA and FE marks.');

            }           
            
        } else {
            $this->dispatchBrowserEvent('message_alert', 'Please enter Student\'s CA and FE marks.');
            
        }
        
    }

    public function clearForm() {
        $this->reset(
            'stu_registration_no',
        );
    }

    public function refreshPage() {

        return redirect()->route('lecturer.student.results');
    
    }
    
    public function render()
    {
        if(!empty($this->module_id)) {
            $this->module = Module::find($this->module_id);        

            $students_results = Result::where('module_code', $this->module->code)->get();

            foreach($students_results as $result) {
                $this->stu_c_a_marks[$result->student_reg_no] = $result->c_a_marks;
                $this->stu_f_e_marks[$result->student_reg_no] = $result->f_e_marks;
                $this->total_marks[$result->student_reg_no] = $result->total_marks;
                $this->grade_ids[$result->student_reg_no] = $result->grade_id;
               
            }
        }
        
        
        $acYear = \App\Models\academicYearProgress::latest()->first();

        $current_modules = course_semister_modules::where('semister_id', $acYear->current_semister_id)->first();
        
        // $courses = Course::latest()->get();
        $modules = lecturer_module::where('lecturer_id', auth()->user()->id)->whereIn('module_id', json_decode($current_modules->module_ids))->get();
        $this->students_enrolled = student_module::where('module_id', $this->module_id)->get();
        
        $this->student_enrolled_count = $this->students_enrolled->count();

        return view('livewire.lecturer.students-results-list', [
            'modules' => $modules,
            // 'courses' => $courses,
            'students_enrolled' => $this->students_enrolled
        ]);
    }
}