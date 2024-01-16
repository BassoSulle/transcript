<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;


class DepartmentList extends Component
{
    public $name,$department_id;


    public $rules = [
        'name' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function SaveDepartment(){
        $validatedData = $this->validate();
     //dd($validatedData);
        Department::create([
            'name'=>$validatedData['name']
            ]);

        notify()->success('Department is added succesfully.!');
        // $this->resetInput();
        // $this->dispatch('close-modal');


    }

//Function to edit Department
public function getDeptmentDetails(int $department_id) {
    $departmentData = Department::find($department_id);

    if ($departmentData) {
        $this->department_id = $departmentData->id;
        $this->name = $departmentData->name;

    }

}

//function to Edit Department
public function EditDepartment(int $department_id) {

    $validatedData = $this->validate();

    Department::where('id', $department_id)->update([
        'name' => $validatedData['name']
    ]);
    notify()->success('Semister is Deleted succesfully.!');
    // $this->resetInput();
    // $this->dispatchBrowserEvent('close-modal');
}

    public function getDeleteDepartment(int $department_id){
    $this->department_id=$department_id;

    }

//Function to delete  Department

    public function DeleteDepartment(int $department_id){

    Department::where('id',$department_id)->delete();
    notify()->success('Department is Deleted succesfully.!');



        }
    public function render()
    {
   $departments=Department::all();
        return view('livewire.department-list',['departments'=>$departments]);
    }
}
