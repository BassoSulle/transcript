<?php

namespace App\Http\Livewire;

use App\Models\NTA;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Award_Classification;

class NtaLevelList extends Component
{
    public $nta_level_id, $name, $award_id;

    public $rules = [
        'name' => 'required',
        'award_id' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    //Function to save data  to database
    public function SaveNTAlevel(){
        $validatedData = $this->validate();
        $nta_level = NTA::create([
                    'name'=>$validatedData['name'],
                    'award_id'=>$validatedData['award_id']
                ]);

        if($nta_level) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'NTA Level added successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

        // notify()->success('Course is added successfully.!');

    }
    
    //Function to get details
    public function getNTAlevelDetails(int $nta_level_id){
        $this->nta_level_id = $nta_level_id;
        $nta_level = NTA::find($this->nta_level_id);

        if($nta_level){
            $this->name=$nta_level->name;
            $this->award_id=$nta_level->award_id;
            
            $this->dispatchBrowserEvent('open-edit-modal');

        }
    }

    //function to edit
    public function EditNTAlevel(){
        $validatedData = $this->validate();

        $nta_level = NTA::where('id',$this->nta_level_id)->update([
                    'name'=>$validatedData['name'],
                    'award_id'=>$validatedData['award_id']
                ]);

                      
        if($nta_level) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'NTA Level updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

    }

    public function getDeleteNTAlevel(int $nta_level_id){
        $this->nta_level_id = $nta_level_id;
        $this->dispatchBrowserEvent('openDeleteModal');

    }
    
    //function to Delete course
    public function DeleteNTALevel(){

        $nta_level = NTA::where('id',$this->nta_level_id)->delete();
        // notify()->success('Course is Deleted successfully.!');

        if($nta_level) {
            $this->clearForm();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'NTA Level deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');

        }

    }

    public function clearForm() {
        $this->reset(
            'name',
            'award_id',
        );
    }
    
    public function render()
    {
        $nta_levels = NTA::latest()->get();
        $awards = DB::table('award_classifications')->latest()->get();

        return view('livewire.nta-level-list', [
            'nta_levels'=>$nta_levels,
            'awards'=>$awards,
        ]);
    }
    
}