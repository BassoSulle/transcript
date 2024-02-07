<?php

namespace App\Http\Livewire\Student;

use App\Models\course_semister_modules;
use App\Models\Module;
use App\Models\student_module;
use Livewire\Component;
use PhpParser\Builder\Function_;

class ModuleList extends Component
{
    public $modules;

    public $module_ids = [];
    
    public function registerModules() {
        dd($this->module_ids);

    }
    
    public function render()
    {
        

        $current_modules = course_semister_modules::where('course_id', auth()->user()->course_id)->first();

        $this->modules = Module::whereIn('id', json_decode($current_modules->module_ids))->get();
        
        // dd($modules);

        return view('livewire.student.module-list', [
            'modules' => $this->modules,
            'current_modules' => $current_modules
        ]);
    }
}