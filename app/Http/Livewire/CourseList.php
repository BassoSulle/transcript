<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Course;

class CourseList extends Component
{
    public $name,$duration,$department_id;


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

    public function DeleteCourse(int $course_id){

        Course::where('id',$course_id)->delete();
        notify()->success('Course is Deleted succesfully.!');



            }
    public function render()
    {
        $departments=Department::latest()->get();
        $courses=Course::all();
        return view('livewire.course-list',['courses'=>$courses],['departments'=>$departments]);
    }
}