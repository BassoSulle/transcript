<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Course;
use App\Models\NTA;

class CourseList extends Component
{
    public $name, $duration, $department_id, $course_id, $nta_level_id;

    public $rules = [
        'name' => 'required',
        'duration' => 'required',
        'department_id' => 'required',
        'nta_level_id' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    //Function to save data  to database
    public function SaveCourse(){
        $validatedData = $this->validate();
        $course = Course::create([
                    'name'=>$validatedData['name'],
                    'duration'=>$validatedData['duration'],
                    'department_id'=>$validatedData['department_id'],
                    'n_t_a_level_id'=>$validatedData['nta_level_id']

                ]);

        if($course) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Course added successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

        // notify()->success('Course is added successfully.!');

    }
    
    //Function to get course details
    public function getCourseDetails(int $course_id){
        $this->course_id=$course_id;
        $course=Course::find($this->course_id);

        if($course){
            $this->name=$course->name;
            $this->duration=$course->duration;
            $this->department_id=$course->department_id;
            $this->nta_level_id=$course->n_t_a_level_id;

        }
    }

    //function to edit course
    public function EditCourse(){
        $validatedData = $this->validate();

        $course = Course::where('id',$this->course_id)->update([
                    'name'=>$validatedData['name'],
                    'duration'=>$validatedData['duration'],
                    'department_id'=>$validatedData['department_id'],
                    'n_t_a_level_id'=>$validatedData['nta_level_id']
                ]);

                      
        if($course) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Course updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

    public function getDeleteCourse(int $course_id){
        $this->course_id=$course_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }
    
    //function to Delete course
    public function DeleteCourse(){

        $course = Course::where('id',$this->course_id)->delete();
        // notify()->success('Course is Deleted succesfully.!');

        if($course) {
            $this->clearForm();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Course deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');


        }

    }

    public function clearForm() {
        $this->reset(
            'name',
            'department_id',
            'nta_level_id',
            'course_id',
            'duration',
        );
    }

    public function render()
    {
        $nta_levels = NTA::latest()->get();
        $departments = Department::latest()->get();
        $courses = Course::latest()->get();;

        return view('livewire.course-list',[
            'courses'=>$courses,
            'nta_levels'=>$nta_levels,
            'departments'=>$departments
        ]);
    }
}