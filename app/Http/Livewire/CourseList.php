<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Course;

class CourseList extends Component
{
    public $name,$duration,$department_id,$course_id;


    public $rules = [
        'name' => 'required',
        'duration' => 'required',
        'department_id' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save data  to database
    public function SaveCourse(){
        $validatedData = $this->validate();
        Course::create([
                    'name'=>$validatedData['name'],
                    'duration'=>$validatedData['duration'],
                    'department_id'=>$validatedData['department_id']

                    ]);
        $this->dispatchBrowserEvent('close-modal');
            
        notify()->success('Course is added successfully.!');

    }
//Function to get course details
public function getCourseDetails(int $course_id){
    $this->course_id=$course_id;
    $coursedata=Course::find($this->course_id);

        if($coursedata){
        $this->course_id=$coursedata->id;
        $this->name=$coursedata->name;
        $this->duration=$coursedata->duration;
        $this->department_id=$coursedata->department_id;

        }
    }

//function to edit semister
    public function EditCourse(){
        $validatedData = $this->validate();

        Course::where('id',$this->course_id)->update([
        'name'=>$validatedData['name'],
        'duration'=>$validatedData['duration'],
        'department_id'=>$validatedData['department_id'],
        ]);

    }
//function to Delete course
    public function DeleteCourse(int $course_id){

        Course::where('id',$this->course_id)->delete();
        notify()->success('Course is Deleted succesfully.!');



            }
    public function render()
    {
        $departments=Department::latest()->get();
        $courses=Course::all();
        return view('livewire.course-list',['courses'=>$courses],['departments'=>$departments]);
    }
}