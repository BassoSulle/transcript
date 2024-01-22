<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StaffList extends Component
{
    public function render()
    {
        $staffs = User::latest()->paginate(10);

        return view('livewire.staff-list', [
            'staffs'=> $staffs
        ]);
    }
}