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
        Semister::create([
            'name'=>$validatedData['name']
            ]);

            $this->dispatchBrowserEvent('close-modal');
            notify()->success('Semister is added successfully..!');

        // $this->resetInput();
        // $this->dispatch('close-modal');


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

        Semister::where('id',$semister_id)->update([
        'name'=>$validatedData['name'],
        ]);
        $this->dispatchBrowserEvent('close-modal');



    }

    public function getDeleteSemister(int $semister_id){
    $this->semister_id=$semister_id;

    }

    public function DeleteSemister(int $semister_id){

    Semister::where('id',$semister_id)->delete();
    notify()->success('Semister is Deleted succesfully.!');



        }

    public function render()
    {
        $semisters = Semister::all();
        return view('livewire.semister-list' ,['semisters' => $semisters]);
    }
}
