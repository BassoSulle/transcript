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
        $department = Department::create([
            'name'=>$validatedData['name']
            ]);
        
        if($department) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Department saved successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }


    //   return notify()->success('Department is added successfully.!');
        // $this->resetInput();


    }

    //Function to edit Department
    public function getDepartmentDetails(int $department_id) {
      $this->department_id=$department_id;
        $departmentData = Department::find($this->department_id);

        if ($departmentData) {
            $this->name = $departmentData->name;

            $this->dispatchBrowserEvent('open-edit-modal');

        }

    }

    //function to Edit Department
    public function EditDepartment() {

        $validatedData = $this->validate();

        $department = Department::where('id', $this->department_id)->update([
            'name' => $validatedData['name']
        ]);
  
        if($department) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Department updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }
        // notify()->success('Department is Updated successfully.!');
        // $this->resetInput();
    }

    public function getDeleteDepartment(int $department_id){
        $this->department_id=$department_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }

    //Function to delete  Department
    public function DeleteDepartment(){

        $department = Department::where('id',$this->department_id)->delete();

        if($department) {
            $this->clearForm();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Department deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');


        }
        // notify()->success('Department is Deleted successfully.!');

    }

    public function clearForm() {
        $this->reset(
            'name',
            'department_id'
        );
    }
        
    public function render()
    {
   $departments=Department::all();
        return view('livewire.department-list',['departments'=>$departments]);
    }
}