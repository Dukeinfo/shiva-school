<?php

namespace App\Http\Livewire\Backend\ExploreShiva;

use Livewire\Component;
use App\Models\ExploreShiva;

class ViewExploreShiva extends Component
{

   public $title,$subtitle,$sort_id,$status; 

	protected $rules = [
        'title' => 'required',  
        'subtitle' => 'required',  
        'sort_id' => 'required| unique:explore_shivas,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'title.required' => 'Title Required.',
          'subtitle.required' => 'Title Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->title = '';
        $this->subtitle = '';
        $this->sort_id = '';
        $this->status = '';
    }

     public function saveRecord(){
      $validatedData = $this->validate();
    	
      $exploreShiva = new ExploreShiva();
      $exploreShiva->title = $this->title;
      $exploreShiva->subtitle = $this->subtitle;
      $exploreShiva->sort_id =$this->sort_id;
      $exploreShiva->status = $this->status;
      $exploreShiva->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
   
   }   

      public function delete($id){
      $exploreShiva = ExploreShiva::findOrFail($id);
      if(!is_null($exploreShiva)){
        $exploreShiva->status = 'Inactive';
        $exploreShiva->save();
      }
     }


    public function render()
    {
    	$this->records = ExploreShiva::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.explore-shiva.view-explore-shiva')->layout('layouts.backend');
    }
}
