<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grade;


class GradeList extends Component
{

    public $name;
    public $low_marks;
    public $high_marks, $point;
    public $grade_id;



    public $rules = [
        'name' => 'required',
        'low_marks' => 'required',
        'high_marks' => 'required',
        'point' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save grade  to database
    public function SaveGrade(){
        $validatedData = $this->validate();
        $grade = Grade::create([
                    'name'=>$validatedData['name'],
                    'low_marks'=>$validatedData['low_marks'],
                    'high_marks'=>$validatedData['high_marks'],
                    'point'=>$validatedData['point']

                ]);

        if($grade) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Grade is added successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

//Function to Delete Grade
    public function DeleteGrade(int $grade_id){
        $grade = Grade::where('id',$grade_id)->delete();
        
        if($grade) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Grade is deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }
        $this->dispatchBrowserEvent('success_alert', 'Grade is Deleted successfully');

    }

//function  get grade details
    public function getGradeDetails(int $grade_id) {
        $this->grade_id=$grade_id;
        $gradeData = Grade::find($this->grade_id);

        if ($gradeData) {
            $this->grade_id = $gradeData->id;
            $this->name = $gradeData->name;
            $this->low_marks = $gradeData->low_marks;
            $this->high_marks = $gradeData->high_marks;
            $this->point = $gradeData->point;

        }

    }

    //function to Edit Grade
    public function EditGrade() {

        $validatedData = $this->validate();

        $grade = Grade::where('id', $this->grade_id)->update([
            'name' => $validatedData['name'],
            'low_marks' => $validatedData['low_marks'],
            'high_marks' => $validatedData['high_marks'],
            'point'=>$validatedData['point']

        ]);

        if($grade) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Grade is updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

    public function clearForm() {
        $this->reset(
            'name',
            'low_marks',
            'high_marks',
            'point',
            'grade_id'
        );
    }



    public function render()
    {
       $grades=Grade::all();
            return view('livewire.grade-list',['grades'=>$grades]);
    }
}