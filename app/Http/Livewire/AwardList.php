<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AwardList extends Component
{

    public $name;
    public $low_gpa;
    public $high_gpa, $overall_gpa;
    public $award_id;



    public $rules = [
        'name' => 'required',
        'low_gpa' => 'required',
        'high_gpa' => 'required',
        'overall_gpa' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

//Function to save grade  to database
    public function saveAward(){
        $validatedData = $this->validate();
        $award = DB::table('award_classifications')->insert([
                    'name'=>$validatedData['name'],
                    'low_gpa'=>$validatedData['low_gpa'],
                    'high_gpa'=>$validatedData['high_gpa'],
                    'overall_gpa'=>$validatedData['overall_gpa']

                ]);

        if($award) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Award added successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }
        
        // notify()->success('Grade is added succesfully.!');

    }

    // function to get details
    public function getDeleteAward(int $award_id) {
        $this->award_id = $award_id;

        $this->dispatchBrowserEvent('openDeleteModal');

    }

    //Function to Delete
    public function DeleteAward(){
        $award = DB::table('award_classifications')->where('id',$this->award_id)->delete();

        if($award) {
            $this->clearForm();
            $this->dispatchBrowserEvent('closeDeleteModal');
            $this->dispatchBrowserEvent('success_alert', 'Award deleted successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }
        // notify()->success('Grade is Deleted successfully.!');

    }

    // function to get details
    public function getAwardDetails(int $award_id) {
        $this->award_id = $award_id;
        $award = DB::table('award_classifications')->where('id',$this->award_id)->get();

        if ($award) {
            foreach($award as $item) {
                $this->name = $item->name;
                $this->low_gpa = $item->low_gpa;
                $this->high_gpa = $item->high_gpa;
                $this->overall_gpa = $item->overall_gpa;
            }
            
            $this->dispatchBrowserEvent('open-edit-modal');

        }

    }

    //function to Edit Grade
    public function EditAward() {

        $validatedData = $this->validate();

        $award = DB::table('award_classifications')->where('id',$this->award_id)->update([
                'name'=>$validatedData['name'],
                'low_gpa'=>$validatedData['low_gpa'],
                'high_gpa'=>$validatedData['high_gpa'],
                'overall_gpa'=>$validatedData['overall_gpa']

            ]);

        if($award) {
            $this->clearForm();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('success_alert', 'Award updated successfully');

        } else {
            $this->dispatchBrowserEvent('failure_alert', 'An error occurred. Try again later.');
            
        }

        // notify()->success('Grade is Udated succesfully.!');

    }

    public function clearForm() {
        $this->reset(
            'name',
            'low_gpa',
            'high_gpa',
            'overall_gpa',
            'award_id',
        );
    }
    
    public function render()
    {
        $awards = DB::table('award_classifications')->latest()->get();
        
        return view('livewire.award-list', [
            'awards'=>$awards,
        ]);
    }
}