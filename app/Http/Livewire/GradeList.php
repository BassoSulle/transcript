<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grade;


class GradeList extends Component
{

    public $name;
    public $low_marks;
    public $high_marks;
    public $grade_id;



    public $rules = [
        'name' => 'required',
        'low_marks' => 'required',
        'high_marks' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save grade  to database
    public function SaveGrade(){
        $validatedData = $this->validate();
        Grade::create([
                    'name'=>$validatedData['name'],
                    'low_marks'=>$validatedData['low_marks'],
                    'high_marks'=>$validatedData['high_marks']

                    ]);

        notify()->success('Grade is added succesfully.!');

    }

//Function to Delete Grade
    public function DeleteGrade(int $grade_id){
    Grade::where('id',$grade_id)->delete();
    notify()->success('Grade is Deleted succesfully.!');

    }

//functionto  get grade details
    public function getGradeDetails(int $grade_id) {
        $gradeData = Grade::find($grade_id);

        if ($gradeData) {
            $this->grade_id = $gradeData->id;
            $this->low_marks = $gradeData->low_marks;
            $this->high_marks = $gradeData->high_marks;

        }

    }

    //function to Edit Grade
    public function EditGrade(int $grade_id) {

        $validatedData = $this->validate();

        Grade::where('id', $grade_id)->update([
            'name' => $validatedData['name'],
            'low_marks' => $validatedData['low_marks'],
            'high_marks' => $validatedData['high_marks']
        ]);
        notify()->success('Grade is Udated succesfully.!');
        // $this->resetInput();
        // $this->dispatchBrowserEvent('close-modal');
    }



    public function render()
    {
       $grades=Grade::all();
            return view('livewire.grade-list',['grades'=>$grades]);
    }
}
