<?php

namespace App\Http\Livewire\Lecturer;

use App\Models\lecturer_module;
use Livewire\Component;

class ModuleList extends Component
{
    public function render()
    {
        // $acYear = \App\Models\academicYearProgress::latest()->first();

        // dd($acYear);

        $modules = lecturer_module::where('lecturer_id', auth()->user()->id)->get();

        return view('livewire.lecturer.module-list', [
            'modules'=> $modules,

        ]);
    }
}