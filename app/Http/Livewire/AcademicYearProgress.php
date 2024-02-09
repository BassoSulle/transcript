<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Semister;
use App\Models\student_module;
use App\Models\course_semister_modules;

class AcademicYearProgress extends Component
{
    public $year_of_studies, $semister_id, $acYear_id, $current_semister_id, $current_modules;
    
    public $moduleIds = [];
    
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
            $this->year_of_studies = $acYear->year_of_studies;
            $this->semister_id = $acYear->current_semister_id;
            $this->current_semister_id = $acYear->current_semister_id;

            $this->current_modules = course_semister_modules::where('ac_year_id', $acYear->id)->where('semister_id', $acYear->current_semister_id)->get();

            
            foreach($this->current_modules as $data) {
                $this->moduleIds[$data->semister_id] = json_decode($data->module_ids);

            }
            
            $this->dispatchBrowserEvent('open-edit-modal');

        }
    }

    //function to edit semister
    public function EditAcademicYear(){
      
        $validatedData = $this->validate();

        $acYear = \App\Models\academicYearProgress::where('id',$this->acYear_id)->update([
                'year_of_studies'=>$validatedData['year_of_studies'],
                'current_semister_id'=>$validatedData['semister_id']
            ]);

        if($acYear) {

            if($this->current_semister_id != $this->semister_id) {
                foreach($this->moduleIds as $data) {
                    $complete_student_semister_module = student_module::whereIn('module_id', $data)->update([
                        'complete_status' => true
                    ]);
                    if(!$complete_student_semister_module) {
                        return $this->dispatchBrowserEvent('failure_alert', 'An error occurred on updating Students semister module complete status. Try again later.');
                    }
                    
                }
            }

            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Academic year updated successfully');
    
          
        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred on updating Academic year details. Try again later.');
            
        }
    }
    
    public function completeYear($acYear_id) {

        $acYear = \App\Models\academicYearProgress::where('id',$acYear_id)->update([
            'progress_status' => true
        ]);

        if($acYear) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Academic year completed successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }   

    public function clearForm() {
        $this->moduleIds = [];
        
        $this->reset(
            'year_of_studies',
            'semister_id',
            'acYear_id',
            'current_semister_id',
            'current_modules'
        );
    }
    
    public function render()
    {
        $acYears = \App\Models\academicYearProgress::latest()->get();
        $semisters = Semister::all();

        return view('livewire.academic-year-progress', [
            'acYears' => $acYears,
            'semisters' => $semisters
        ]);
    }
}