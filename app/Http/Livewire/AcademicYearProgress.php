<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Semister;

class AcademicYearProgress extends Component
{
    public $year_of_studies, $semister_id, $acYear_id;
    
    public function mount() {
        $nextYear = Carbon::now()->addYear()->format('Y');
        $currentYear = Carbon::now()->format('Y');
    
        $this->year_of_studies = $currentYear.'/'.$nextYear;
    }

    public $rules = [
        'year_of_studies' => 'required',
        'semister_id' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    //Function to save data  to database
    public function SaveAcademicYear(){
        $validatedData = $this->validate();

        $acYear = \App\Models\academicYearProgress::create([
                    'year_of_studies'=>$validatedData['year_of_studies'],
                    'current_semister_id'=>$validatedData['semister_id']
                ]);

        if($acYear) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Academic year added successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

    //Function to get module details
    public function getAcademicYearDetails(int $acYear_id){
        $this->acYear_id=$acYear_id;

        $acYear = \App\Models\academicYearProgress::find($this->acYear_id);

            if($acYear){
                $this->year_of_studies = $acYear->name;
                $this->semister_id = $acYear->current_semister_id;

                $this->dispatchBrowserEvent('open-edit-modal');

            }
    }

    //function to edit semister
    public function EditAcademicYear(){
        $validatedData = $this->validate();

        $acYear = \App\Models\academicYearProgress::where('id',$this->module_id)->update([
                'year_of_studies'=>$validatedData['year_of_studies'],
                'current_semister_id'=>$validatedData['semister_id']
            ]);

        if($acYear) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Academic year updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }
    }
    
    public function clearForm() {
        $this->reset(
            'year_of_studies',
            'semister_id',
            'acYear_id'
        );
    }
    
    public function render()
    {
        $acYears = \App\Models\academicYearProgress::latest()->get();
        $semisters=Semister::all();

        return view('livewire.academic-year-progress', [
            'acYears' => $acYears,
            'semisters' => $semisters
        ]);
    }
}