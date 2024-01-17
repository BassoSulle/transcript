<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentList extends Component
{
    public function render()
    {
        $students = Student::latest()->paginate(10);
        
        return view('livewire.student-list', [
            'students' => $students,
        ]);
    }
}