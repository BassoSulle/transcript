<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Course;
use Livewire\WithFileUploads;

class StudentList extends Component
{
    use WithFileUploads;
    public $first_name,$middle_name,$surname,$registration_no,$email,$gender,$dob,$passport_size,$course_id,$student_id;

    public $rules = [
        'first_name' => 'required',
        'middle_name' => 'required',
        'surname' => 'required',
        'registration_no' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'course_id' => 'required',
        'passport_size' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save data  to database
    public function SaveStudent(){
        $validatedData = $this->validate();
        Student::create([
                    'first_name'=>$validatedData['first_name'],
                    'middle_name'=>$validatedData['middle_name'],
                    'surname'=>$validatedData['surname'],
                    'registration_no'=>$validatedData['registration_no'],
                    'email'=>$validatedData['email'],
                    'gender'=>$validatedData['gender'],
                    'dob'=>$validatedData['dob'],
                    'passport_size'=>$validatedData['passport_size'],
                    'course_id'=>$validatedData['course_id'],

                    ]);

                    $this->dispatchBrowserEvent('close-modal');

                     notify()->success('Student is added succesfully.!');



    }
//Function to Get studentdetais
    public function getStudentDetails(int $student_id){
    $this->student_id=$student_id;
    $studentData=Student::find($this->student_id);
// dd($studentData);
        if($studentData){

            $this->first_name=$studentData->first_name;
            $this->middle_name=$studentData->middle_name;
            $this->surname=$studentData->surname;
            $this->registration_no=$studentData->registration_no;
            $this->email=$studentData->email;
            $this->gender=$studentData->gender;
            $this->dob=$studentData->dob;
            $this->passport_size=$studentData->passport_size;
            $this->course_id=$studentData->course_id;

            $this->dispatchBrowserEvent('open-edit-modal');

        }
    }
//Function to edit student
    public function EditStudent(){
        $validatedData=$this->validate();
        Student::where('id',$this->student_id)->update([
        'first_name'=>$validatedData['first_name'],
        'middle_name'=>$validatedData['middle_name'],
        'surname'=>$validatedData['surname'],
        'registration_no'=>$validatedData['registration_no'],
        'email'=>$validatedData['email'],
        'gender'=>$validatedData['gender'],
        'dob'=>$validatedData['dob'],
        'passport_size'=>$validatedData['passport_size'],
        'course_id'=>$validatedData['course_id'],
    ]);

    $this->dispatchBrowserEvent('close-modal');


    }

//Function to Delete Student
    public function DeleteStudent(int $student_id){

        Student::where('id',$this->student_id)->delete();
    }


    public function render()
    {
        $students = Student::latest()->paginate(10);
        $courses=Course::all();

        return view('livewire.student-list', [
            'students' => $students,
            'courses' => $courses,
        ]);
    }
}
