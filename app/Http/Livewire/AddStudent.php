<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddStudent extends Component
{
    use WithFileUploads;

    public $student, $first_name, $middle_name, $surname, $registration_no, $email, $gender, $dob, $passport_size, $course_id, $student_id, $imageName;

    public $editMode = false;

    public function mount($student = null)
    {
        $this->student_id = $student;

        if ($student) {
            $this->editMode = true;

            $this->student = Student::findOrFail($this->student_id);

            $this->first_name = $this->student->first_name;
            $this->middle_name = $this->student->middle_name;
            $this->surname = $this->student->surname;
            $this->registration_no = $this->student->registration_no;
            $this->email = $this->student->email;
            $this->dob = $this->student->dob;
            $this->course_id = $this->student->course_id;
            $this->passport_size = $this->student->passport_size;
            $this->gender = $this->student->gender;

        } else {
            $this->editMode = false;
        }
    }

    public $rules = [
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'surname' => 'required',
        'registration_no' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'course_id' => 'required',
        'passport_size' => ['nullable', 'image'],
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function SaveStaff()
    {
        $validatedData = $this->validate();

        if ($this->editMode == false) {

            $checkStaffExists = Student::where('email', $validatedData['email'])->exists();

            if ($checkStaffExists) {
                $this->dispatchBrowserEvent('message_alert', 'The Email already exists..');

            } else {

                $student = Student::create([
                    'first_name' => $validatedData['first_name'],
                    'middle_name' => $validatedData['middle_name'],
                    'surname' => $validatedData['surname'],
                    'registration_no' => $validatedData['registration_no'],
                    'email' => $validatedData['email'],
                    'gender' => $validatedData['gender'],
                    'dob' => $validatedData['dob'],
                    'course_id' => $validatedData['course_id'],
                    'password' => bcrypt(12345),
                ]);

                if ($student) {

                    $this->clearForm();

                    $this->dispatchBrowserEvent('student_success_alert', 'New Student saved successfully');

                } else {
                    $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

                }

            }

        } else {

            // Delete the old image if it exists
            if (!empty($this->passport_size)) {
                $path = 'storage/student_passports/' . $this->passport_size;

                if (File::exists($path)) {
                    File::delete($path);

                    // Get the original file name
                    $this->imageName = date('YmdHi') . '-' . $this->first_name . '_' . $this->surname . '.' . $validatedData['passport_size']->getClientOriginalExtension();

                    // Store the image in the storage folder with its original name
                    $this->passport_size->storeAs('user_images', $this->imageName, 'public');

                } else {
                    // Get the original file name
                    $this->imageName = date('YmdHi') . '-' . $this->first_name . '_' . $this->surname . '.' . $validatedData['passport_size']->getClientOriginalExtension();

                    // Store the image in the storage folder with its original name
                    $this->passport_size->storeAs('student_passports', $this->imageName, 'public');

                }

            } else {
                $this->imageName = $this->student->image;

            }

            $student = Student::where('id', $this->student_id)->update([
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'],
                'surname' => $validatedData['surname'],
                'registration_no' => $validatedData['registration_no'],
                'email' => $validatedData['email'],
                'gender' => $validatedData['gender'],
                'dob' => $validatedData['dob'],
                'passport_size' => $this->imageName,
                'course_id' => $validatedData['course_id'],

            ]);

            if ($student) {

                $this->clearForm();

                $this->dispatchBrowserEvent('student_success_alert', 'Student details updated successfully');

            } else {

                $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

            }

        }

    }

    public function clearForm()
    {
        $this->student = '';

        $this->reset(
            'first_name',
            'middle_name',
            'surname',
            'registration_no',
            'email',
            'dob',
            'passport_size',
            'gender',
            'course_id',
            'student_id'
        );
    }

    public function render()
    {
        $courses = Course::all();

        return view('livewire.add-student', [
            'courses' => $courses,
        ]);
    }
}