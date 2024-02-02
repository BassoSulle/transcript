<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StaffList extends Component
{
    public $staff_id;

    public function getDeleteStaff(int $staff_id){
        $this->staff_id=$staff_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }

    //Function to delete  Department

    public function DeleteStaff(){

    $staff = User::where('id',$this->staff_id)->delete();

        if($staff) {
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Staff deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');


        }
        // notify()->success('Department is Deleted successfully.!');

    }

    public function clearForm() {
        $this->reset(
            'staff_id'
        );
    }

    public function render()
    {
        $staffs = User::latest()->paginate(10);

        return view('livewire.staff-list', [
            'staffs'=> $staffs
        ]);
    }
}