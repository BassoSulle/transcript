<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use Livewire\Component;
use App\Models\Semister;
use App\Models\course_semister_modules;
use App\Models\lecturer_module;

class AssignModules extends Component
{
    public $staff_id, $lect_name, $semister_id, $module_id, $assigned_modules, $module_count;

    public $module_ids = [];

    public $show_assigned_modules = false;
    
    public $editMode = false;

    public function mount($staff = null) {
        $this->staff_id = $staff;

        if($staff) {
            $staff = User::find($this->staff_id);

            $this->lect_name = $staff->first_name.' '.$staff->middle_name.' '.$staff->surname;

        }

    }

    public function assignModule($module_id) {
        $this->module_id = $module_id;

        $checkModuleExists = lecturer_module::where('lecturer_id', $this->staff_id)->where('module_id', $this->module_id)->exists();

            if ($checkModuleExists) {
                $this->dispatchBrowserEvent('message_alert', 'Module already assigned.');

            } else {

                $module = lecturer_module::create([
                    'lecturer_id' => $this->staff_id,
                    'module_id' => $this->module_id,
                    'semister_id' => $this->semister_id
                ]);

                if ($module) {

                    $this->clearForm();

                    $this->dispatchBrowserEvent('success_alert', 'Module assigned successfully');

                } else {
                    $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

                }

            }
    }

    public function removeModule($module_id) {
        $this->module_id = $module_id;

        $module = lecturer_module::where('lecturer_id', $this->staff_id)->where('module_id', $this->module_id)->delete();

        if ($module) {

            $this->clearForm();

            $this->dispatchBrowserEvent('success_alert', 'Module removed successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

        }

    }

    public function getModules() {
        $this->show_assigned_modules = false;
    }

    public function getAssignedModules() {
        $this->show_assigned_modules = true;
    }

    public function clearForm() {
        $this->editMode = false;

        $this->reset(
            'module_id',
        );
        
    }
    
    public function render()
    {
        $modules = Module::all();
        $semisters = Semister::all();
        $courses = Course::all();

        $this->assigned_modules = lecturer_module::where('lecturer_id', $this->staff_id)->get();
        $this->module_count = lecturer_module::where('lecturer_id', $this->staff_id)->count();
        
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