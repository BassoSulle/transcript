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

        $this->dispatchBrowserEvent('close-modal');

      return notify()->success('Department is added succesfully.!');
        // $this->resetInput();


    }

    //Function to edit Department
    public function getDeptmentDetails(int $department_id) {
        $departmentData = Department::find($department_id);

        if ($departmentData) {
            $this->department_id = $departmentData->id;
            $this->name = $departmentData->name;

            $this->dispatchBrowserEvent('open-edit-modal');

        }

    }

    //function to Edit Department
    public function EditDepartment(int $department_id) {

        $validatedData = $this->validate();

        Department::where('id', $department_id)->update([
            'name' => $validatedData['name']
        ]);

        $this->dispatchBrowserEvent('close-modal');

        notify()->success('Semister is Updated successfully.!');
        // $this->resetInput();
    }

    public function getDeleteDepartment(int $department_id){
        $this->department_id=$department_id;

    }

    //Function to delete  Department

    public function DeleteDepartment(int $department_id){

    Department::where('id',$department_id)->delete();
    notify()->success('Department is Deleted successfully.!');



        }
    public function render()
    {
   $departments=Department::all();
        return view('livewire.department-list',['departments'=>$departments]);
    }
}
