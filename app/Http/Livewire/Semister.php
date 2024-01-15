<?php

namespace App\Http\Livewire;

use Livewire\Component;




class Semister extends Component
{

    public $name;


    public $rules = [
        'name' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function AddSemister(){
        $validatedData = $this->validate();
//dd($validatedData);
        Semister::create($validatedData);

        notify()->success('Semister is added succesfully.!');


    }
        public function render()
        {
            $semisters = Semister::all();
            //dd($semisters);
            return view('livewire.semister ',['semisters' => $semisters]);

        }
}
