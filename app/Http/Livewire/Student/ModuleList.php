<?php

namespace App\Http\Livewire\Student;

use App\Models\academicYearProgress;
use App\Models\course_semister_modules;
use App\Models\Module;
use App\Models\student_module;
use Livewire\Component;
use PhpParser\Builder\Function_;

class ModuleList extends Component
{
    public $modules;

    public $registration_status = false;

    public $module_ids = [];
    
    public function mount() {
        $modules_registered = student_module::where('student_id', auth()->user()->id)->where('complete_status', false)->get();

        if(count($modules_registered) != 0) {
            $this->registration_status = true;
            $moduleIds = [];
            
            foreach($modules_registered as $module) {
                array_push($moduleIds, $module->module_id);

            }

            $this->module_ids = array_unique($moduleIds);

            $this->modules = $modules_registered;

        } else {
            $this->registration_status = false;

        }

    }

    public function registerModules() {
        $moduleIds = array_unique($this->module_ids);

        foreach($moduleIds as $module_id) {

            $checkModuleExists = student_module::where('student_id', auth()->user()->id)->where('module_id', $module_id)->exists();

            if ($checkModuleExists) {
                return $this->dispatchBrowserEvent('message_alert', 'Module already registered.');

            } else {

                $module = student_module::create([
                    'student_id' => auth()->user()->id,
                    'module_id' => $module_id,
                    // 'semister_id' => $this->semister_id
                ]);
                
            }
        }


        $modules_registered = student_module::where('student_id', auth()->user()->id)->whereIn('module_id', $moduleIds)->exists();

        if ($modules_registered) {

            $this->clearForm();

            $this->dispatchBrowserEvent('success_alert', 'Module assigned successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

        }
        
    }

    public function clearForm() {

        $this->module_ids = [];
        $this->registration_status = true;

    }
    
    public function render()
    {
        
        $acYear = \App\Models\academicYearProgress::latest()->first();
        
        $current_modules = course_semister_modules::where('course_id', auth()->user()->course_id)->where('semister_id', $acYear->current_semister_id)->first();

        // if($this->registration_status == false) {
            $this->modules = Module::whereIn('id', json_decode($current_modules->module_ids))->get();

        // }
        
        return view('livewire.student.module-list', [
            'modules' => $this->modules,
            'current_modules' => $current_modules
        ]);
    }
}