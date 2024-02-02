<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use Livewire\Component;
use App\Models\Semister;
use App\Models\course_semister_modules;

class AssignModules extends Component
{
    public $staff_id, $lect_name, $semister_id;

    public $module_ids = [];
    
    public $editMode = false;

    public function mount($staff = null) {
        $this->staff_id = $staff;

        if($staff) {
            $staff = User::find($this->staff_id);

            $this->lect_name = $staff->first_name.' '.$staff->middle_name.' '.$staff->surname;

        }

    }
    public function render()
    {
        $modules = Module::all();
        $semisters = Semister::all();
        $courses = Course::all();
        
        if(!empty($this->semister_id)) {
            $course_semister_modules = course_semister_modules::where('semister_id',$this->semister_id)->get();

            foreach($course_semister_modules as $item) {
                $modules = Module::whereIn('id', json_decode($item->module_ids))->get();

            }
            
        }
        

        return view('livewire.assign-modules', [
            'courses' => $courses,
            'semisters' => $semisters,
            'modules' => $modules,
            
        ]);
    }
}