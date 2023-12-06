<?php

namespace App\Http\Livewire\Backend\ExploreShiva;

use Livewire\Component;
use App\Models\ExploreShiva;

class EditExploreShiva extends Component
{
    public $editId,$title,$subtitle,$sort,$status; 

     public function mount($id)
     {
        $exploreShiva = ExploreShiva::findOrFail($id);
        $this->editId = $exploreShiva->id;
        $this->title = $exploreShiva->title;
        $this->subtitle = $exploreShiva->subtitle;
    	$this->sort_id = $exploreShiva->sort_id;
    	$this->status = $exploreShiva->status;
     }

 
     public function saveRecord(){
      $exploreShiva = ExploreShiva::find($this->editId);
      $exploreShiva->title = $this->title;
      $exploreShiva->subtitle = $this->subtitle;
      $exploreShiva->sort_id =$this->sort_id;
      $exploreShiva->status = $this->status;
      $exploreShiva->save();

     
     return redirect()->route('view_explore_shiva');
   
   }   

    public function render()
    {
        return view('livewire.backend.explore-shiva.edit-explore-shiva')->layout('layouts.backend');
    }
}
