<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Semister;
class SemisterList extends Component
{
    public $name,$semister_id;


    public $rules = [
        'name' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function AddSemister(){
        $validatedData = $this->validate();
        $semister = Semister::create([
            'name'=>$validatedData['name']
            ]);
            // notify()->success('Semister is added successfully..!');

        if($semister) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Semister added successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }


    }

//Function to get semister details
    public function getSemisterDetails(int $semister_id){
    $semisterData=Semister::find($semister_id);

        if($semisterData){
            $this->semister_id=$semisterData->id;
            $this->name=$semisterData->name;

            $this->dispatchBrowserEvent('open-edit-modal');

        }
    }

//function to edit semister
    public function EditSemister(int $semister_id){
        $validatedData = $this->validate();

        $semister = Semister::where('id',$semister_id)->update([
        'name'=>$validatedData['name'],
        ]);

        if($semister) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Semister Updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

    public function getDeleteSemister(int $semister_id){
        $this->semister_id=$semister_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }

    public function DeleteSemister(){
        $semister = Semister::where('id',$this->semister_id)->delete();
        // notify()->success('Semister is Deleted succesfully.!');

        if($semister) {
            $this->clearForm();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Semister deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }


    public function clearForm() {
        $this->reset(
            'name',
            'semister_id',
        );
    }

    public function render()
    {
        $semisters = Semister::all();
        return view('livewire.semister-list' ,['semisters' => $semisters]);
    }
}