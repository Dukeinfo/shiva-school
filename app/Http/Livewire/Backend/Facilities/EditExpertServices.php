<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\ExpertService;
class EditExpertServices extends Component
{
    public $editId,$title,$howmany,$link,$sort,$status;

    public function mount($id)
     {
      $facilities = ExpertService::findOrFail($id);
      $this->editId = $facilities->id;
      $this->title = $facilities->title;
      $this->howmany = $facilities->howmany;
      $this->link = $facilities->link;
    	$this->sort = $facilities->sort_id;
    	$this->status = $facilities->status;
     }

     public function saveRecord()
    {

      $facilities =ExpertService::find($this->editId);
      $facilities->title = $this->title;
      $facilities->howmany = $this->howmany;
      $facilities->link = $this->link;
      $facilities->sort_id =$this->sort;
      $facilities->status = $this->status;
      $facilities->save();

     return redirect()->route('view_facilities_other'); 

    } 

    public function render()
    {
        return view('livewire.backend.facilities.edit-expert-services')->layout('layouts.backend');
    }
}
