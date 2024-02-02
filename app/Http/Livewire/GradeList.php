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
        Grade::create([
                    'name'=>$validatedData['name'],
                    'low_marks'=>$validatedData['low_marks'],
                    'high_marks'=>$validatedData['high_marks'],
                    'point'=>$validatedData['point']

                ]);

        $this->dispatchBrowserEvent('close-modal');


        notify()->success('Grade is added succesfully.!');

    }

//Function to Delete Grade
    public function DeleteGrade(int $grade_id){
    Grade::where('id',$grade_id)->delete();
    notify()->success('Grade is Deleted succesfully.!');

    }

//functionto  get grade details
    public function getGradeDetails(int $grade_id) {
        $this->grade_id=$grade_id;
        $gradeData = Grade::find($this->grade_id);

        if ($gradeData) {
            $this->grade_id = $gradeData->id;
            $this->low_marks = $gradeData->low_marks;
            $this->high_marks = $gradeData->high_marks;
            $this->point = $gradeData->point;

        }

    }

    //function to Edit Grade
    public function EditGrade() {

        $validatedData = $this->validate();

        Grade::where('id', $this->grade_id)->update([
            'name' => $validatedData['name'],
            'low_marks' => $validatedData['low_marks'],
            'high_marks' => $validatedData['high_marks'],
            'point'=>$validatedData['point']

        ]);

        $this->dispatchBrowserEvent('close-modal');

        notify()->success('Grade is Udated succesfully.!');

    }



    public function render()
    {
       $grades=Grade::all();
            return view('livewire.grade-list',['grades'=>$grades]);
    }
}