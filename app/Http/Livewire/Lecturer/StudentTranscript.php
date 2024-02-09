<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\User;
use App\Models\Module;
use App\Models\Result;
use App\Models\Student;
use Livewire\Component;
use App\Models\AwardClassification;
use App\Models\course_semister_modules;

class StudentTranscript extends Component
{
    public $stu_reg_no, $student, $student_semister_modules, $overall_gpa, $award_class, $register, $hod;

    public $semister_results = [];
    
    public $semister_gpa = [];

    public function mount($student) {
        if($student) {
            $this->stu_reg_no = $student;
            
            $this->student = Student::where('registration_no', $this->stu_reg_no)->first();
            
            $acYear_ids = [];
            $y = 0;
            $k = 0;
            $g = 0;
            
            $acYears = \App\Models\academicYearProgress::all();
            
            foreach($acYears as $acYear) {
                $y++;
                $acYear_ids[$y] = $acYear->id;

            }

            // dd($acYear_ids);
            
            $this->student_semister_modules = course_semister_modules::where('course_id', $this->student->course_id)->whereIn('ac_year_id', array_unique($acYear_ids))->get();

            // dd($this->student_semister_modules);

            foreach($this->student_semister_modules as $data) {
                $k++;
                $stu_results = Result::where('student_reg_no', $this->stu_reg_no)->whereIn('module_id', json_decode($data->module_ids))->orderBy('module_id', 'asc')->get();
    
                $this->semister_results[$k] = $stu_results;

                // dd($this->semister_results);
                $gpa = 0;
                $sum_credit_grade_product = 0;
                $total_credit = 0;
                 foreach($this->semister_results as $results) {
                    if(count($results)){

                        if(count($results) !=0) {
                            foreach($results as $result) {

                                $credit_grade_product = $result->grade->point * $result->module->credit;

                                $sum_credit_grade_product += $credit_grade_product;
                                $total_credit += $result->module->credit;
                                
                            }
                        }

                        $this->semister_gpa[$k] = round($sum_credit_grade_product/$total_credit, 1);

                    }
                }

            }

            // dd($this->semister_results);


            $total_gpa = 0;
            
            foreach($this->student_semister_modules as $data) {
                $g++;
                $total_gpa += $this->semister_gpa[$g];

            }

            $this->overall_gpa = $total_gpa/(count($this->semister_gpa));

            $this->award_class = AwardClassification::where('low_gpa', '<=', round($this->overall_gpa, 0))
                                ->where('high_gpa', '>=', round($this->overall_gpa, 0))
                                ->first();
                                

            $this->hod = User::where('role', 'HOD')->where('department_id', $this->student->course->department->id)->first();

            $this->register = User::where('role', 'Register')->first();
        }

    }
    
    public function render()
    {
        return view('livewire.lecturer.student-transcript');
    }
}