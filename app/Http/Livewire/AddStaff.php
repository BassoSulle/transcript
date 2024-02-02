<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;

class AddStaff extends Component
{
    public $staff_id, $staff, $first_name, $middle_name, $surname, $email, $department_id, $role, $gender;

    public $editMode = false;

    public function mount($staff_id = null)
    {
        $this->staff_id = $staff_id;

        if ($staff_id) {
            $this->editMode = true;

            $this->staff = User::findOrFail($staff_id);

            $this->first_name = $this->staff->first_name;
            $this->middle_name = $this->staff->middle_name;
            $this->surname = $this->staff->surname;
            $this->email = $this->staff->email;
            $this->department_id = $this->staff->department_id;
            $this->role = $this->staff->role;
            $this->gender = $this->staff->gender;

        } else {
            $this->editMode = false;
        }
    }

    public $rules = [
        'first_name' => ['required', 'string'],
        'middle_name' => ['nullable', 'string'],
        'surname' => ['required', 'string'],
        'role' => ['required', 'string'],
        'department_id' => ['required'],
        'gender' => ['required'],
        'email' => ['required', 'email'],
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function SaveStaff()
    {
        $validatedData = $this->validate();

        if ($this->editMode == false) {

            $checkStaffExists = User::where('email', $validatedData['email'])->exists();

            if ($checkStaffExists) {
                $this->dispatchBrowserEvent('message_alert', 'The Email already exists..');

            } else {

                $staff = User::create([
                    'first_name' => $validatedData['first_name'],
                    'middle_name' => $validatedData['middle_name'],
                    'surname' => $validatedData['surname'],
                    'role' => $validatedData['role'],
                    'email' => $validatedData['email'],
                    'department_id' => $validatedData['department_id'],
                    'gender' => $validatedData['gender'],
                    'password' => bcrypt(12345),
                ]);

                if ($staff) {

                    $this->clearForm();

                    $this->dispatchBrowserEvent('staff_success_alert', 'New Staff saved successfully');

                } else {
                    $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

                }

            }

        } else {

            $staff = User::where('id', $this->staff_id)->update([
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'],
                'surname' => $validatedData['surname'],
                'role' => $validatedData['role'],
                'email' => $validatedData['email'],
                'department_id' => $validatedData['department_id'],
                'gender' => $validatedData['gender'],

            ]);

            if ($staff) {

                $this->clearForm();

                $this->dispatchBrowserEvent('staff_success_alert', 'Staff details updated successfully');

            } else {

                $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

            }

        }

    }

     public function clearForm() {
        $this->editMode = false;

        $this->staff = '';

        $this->staff_id = '';

        $this->reset(
            'first_name',
            'middle_name',
            'surname',
            'email',
            'department_id',
            'role',
            'gender',
        );
    }

    public function render()
    {
        $departments = Department::all();

        return view('livewire.add-staff', [
            'departments' => $departments,
        ]);
    }
}