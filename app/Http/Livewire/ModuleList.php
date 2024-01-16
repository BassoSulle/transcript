<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Semister;
use App\Models\Module;



class ModuleList extends Component
{
    public $name,$code,$module_id,$semister_id;


    public $rules = [
        'name' => 'required',
        'code' => 'required',
        'semister_id' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save data  to database
    public function SaveModule(){
        $validatedData = $this->validate();
        Module::create([
                    'name'=>$validatedData['name'],
                    'code'=>$validatedData['code'],
                    'semister_id'=>$validatedData['semister_id']

                    ]);

        notify()->success('Module is added succesfully.!');

    }
    public function DeleteModule(int $module_id){
    Module::where('id',$module_id)->delete();
    notify()->success('Module is Deleted succesfully.!');

    }
//Rander function
    public function render()
    {
        $modules=Module::all();
        $semisters=Semister::latest()->get();

            return view('livewire.module-list',
                    ['modules'=> $modules],
                    ['semisters'=>$semisters]
        );
    }
}
