<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Module;
use Livewire\Component;
use App\Models\Semister;
use App\Models\course_semister_modules;

class AddCourseSemisterModules extends Component
{

    public $course_id, $semister_id;
    
    public $module_ids = [];

    public $editMode = false;

    public function mount($course = null)
    {
        $this->course_id = $course ;

        if ($course){
            $this->editMode = true;
            $course_semister_modules = course_semister_modules::find($this->course_id);

            $this->course_id = $course_semister_modules->course_id;
            $this->semister_id = $course_semister_modules->semister_id;
            $this->module_ids = json_decode($course_semister_modules->module_ids);
            
        }else{
            $this->editMode = false;
            
        }
    }

    public $rules = [
        'course_id' => ['required', 'integer'],
        'semister_id' => ['required', 'integer'],
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    
    public function saveSemisterModules()
    {
        $validatedData = $this->validate();

        if (count($this->module_ids) == 0) {
            $this->dispatch('message_alert', 'No Module selected.');
            
            return;
        
        } else {

            $module_ids = json_encode($this->module_ids);

            if ($this->editMode){
                $course_semister_modules = course_semister_modules::where('course_id', $this->course_id)->where('semister_id', $this->semister_id)->update([
                    'course_id' => $validatedData['course_id'],
                    'semister_id' => $validatedData['semister_id'],
                    'module_ids' => $module_ids,
                ]);

                if ($course_semister_modules) {

                    $this->clearForm();

                    $this->dispatchBrowserEvent('csm_success_alert', 'New Course Semister modules added successfully');

                } else {
                    $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

                }

            } else{

                $course_semister_modules = course_semister_modules::create([
                    'course_id' => $validatedData['course_id'],
                    'semister_id' => $validatedData['semister_id'],
                    'module_ids' => $module_ids,
                ]);

                if ($course_semister_modules) {

                    $this->clearForm();

                    $this->dispatchBrowserEvent('csm_success_alert', 'Course Semister modules updated successfully');

                } else {
                    $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

                }
            }

        }

    }

    public function clearForm()
    {
        $this->editMode = false;

    }
    
    public function render()
    {
        $modules = Module::all();
        $semisters = Semister::all();
        $courses = Course::all();

        // if(!empty($this->semister_id)) {
        //     $modules = Module::all();
        // }

        return view('livewire.add-course-semister-modules', [
            'courses' => $courses,
            'semisters' => $semisters,
            'modules' => $modules,
            
        ]);
    }
}