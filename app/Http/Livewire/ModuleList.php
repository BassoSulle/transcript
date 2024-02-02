<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Semister;
use App\Models\Module;



class ModuleList extends Component
{
<<<<<<< HEAD
    public $name,$code,$module_id,$credit,$semister_id;

=======
    public $name,$code, $credit, $module_id,$semister_id;
>>>>>>> origin/bashiri

    public $rules = [
        'name' => 'required',
        'code' => 'required',
        'credit' => 'required',
<<<<<<< HEAD
        'semister_id' => 'required',
=======
        // 'semister_id' => 'required',
>>>>>>> origin/bashiri
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save data  to database
    public function SaveModule(){
        $validatedData = $this->validate();
        $module = Module::create([
                    'name'=>$validatedData['name'],
                    'code'=>$validatedData['code'],
                    'credit'=>$validatedData['credit'],
<<<<<<< HEAD
                    'semister_id'=>$validatedData['semister_id']
=======
                    // 'semister_id'=>$validatedData['semister_id']
>>>>>>> origin/bashiri

                    ]);

        if($module) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Module added successfully');

<<<<<<< HEAD
        notify()->success('Module is added succesfully.!');

        $this->dispatchBrowserEvent('close-modal');


    }

//Function to get module details
public function getModuleDetails(int $module_id){
    $this->module_id=$module_id;
    $moduleData=Module::find($this->module_id);

        if($moduleData){
        $this->module_id=$moduleData->id;
        $this->name=$moduleData->name;
        $this->code=$moduleData->code;
        $this->credit=$moduleData->credit;
        $this->semister_id=$moduleData->semister_id;

=======
        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
>>>>>>> origin/bashiri
        }

        // notify()->success('Module is added succesfully.!');

    }

    //Function to get module details
    public function getModuleDetails(int $module_id){
        $this->module_id=$module_id;
        $moduleData=Module::find($this->module_id);

            if($moduleData){
                $this->name=$moduleData->name;
                $this->code=$moduleData->code;
                $this->credit=$moduleData->credit;
                $this->semister_id=$moduleData->semister_id;

                $this->dispatchBrowserEvent('open-edit-modal');

            }
    }

    //function to edit semister
    public function EditModule(){
        $validatedData = $this->validate();

<<<<<<< HEAD
        Module::where('id',$this->module_id)->update([
        'name'=>$validatedData['name'],
        'code'=>$validatedData['code'],
        'credit'=>$validatedData['credit'],
        'semister_id'=>$validatedData['semister_id'],
        ]);
        $this->dispatchBrowserEvent('close-modal');
=======
        $module = Module::where('id',$this->module_id)->update([
                'name'=>$validatedData['name'],
                'code'=>$validatedData['code'],
                'credit'=>$validatedData['credit'],
                // 'semister_id'=>$validatedData['semister_id'],
            ]);
>>>>>>> origin/bashiri

        if($module) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Module updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }
    }


    public function getDeleteModule(int $module_id){
        $this->module_id=$module_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }
    
    public function DeleteModule(){
        $module = Module::where('id',$this->module_id)->delete();
        // notify()->success('Module is Deleted succesfully.!');

        if($module) {
            $this->clearForm();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Module deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

    public function clearForm() {
        $this->reset(
            'name',
            'code',
            'credit',
            'module_id'
        );
    }

    
    //Rander function
    public function render()
    {
        $modules=Module::all();
        $semisters=Semister::latest()->get();

        return view('livewire.module-list', [
                'modules'=> $modules,
                'semisters'=>$semisters
            ]);
    }
}