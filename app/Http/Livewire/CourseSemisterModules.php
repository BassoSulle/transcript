<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\course_semister_modules;
use App\Models\Module;
use App\Models\Semister;
use Livewire\Component;

class CourseSemisterModules extends Component
{
    public $csm_id;

    public function getDeleteCsm(int $csm_id){
        $this->csm_id = $csm_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }

    //Function to delete  Department

    public function DeleteCsm(){

        $course_semister_modules = course_semister_modules::where('id',$this->csm_id)->delete();

        if($course_semister_modules) {
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Course Semister modules deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

        }

    }
    public function render()
    {
        $modules = Module::all();
        $semisters = Semister::all();

        $course_semister_modules = course_semister_modules::latest()->get();
        
        return view('livewire.course-semister-modules', [
            'course_semister_modules' => $course_semister_modules,
            'semisters' => $semisters,
            'modules' => $modules,
            
        ]);
    }
}