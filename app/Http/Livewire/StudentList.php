<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class StudentList extends Component
{
    use WithFileUploads;
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $student_id;

    //Function to Delete Student
    public function getDeleteStudent(int $student_id){
        $this->student_id=$student_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }

    public function DeleteStudent(){

        $student = Student::where('id',$this->student_id)->delete();

        if($student) {
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Student deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');


        }
    }

    public function clearForm()
    {
        $this->reset(
        
            'student_id'
        );
        
    }

    public function render()
    {
        $students = Student::latest()->paginate(10);
        $courses=Course::all();

        return view('livewire.student-list', [
            'students' => $students,
            'courses' => $courses,
        ]);
    }
}