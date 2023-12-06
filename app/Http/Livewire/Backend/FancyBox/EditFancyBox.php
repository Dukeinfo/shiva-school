<?php

namespace App\Http\Livewire\Backend\FancyBox;

use Livewire\Component;
use App\Models\FancyBox;

class EditFancyBox extends Component
{
   public $editId,$category,$desc,$sort_id,$status;

   public function mount($id)
     {
        $fancyBox = FancyBox::findOrFail($id);
        $this->editId = $fancyBox->id;
        $this->category = $fancyBox->category;
        $this->desc = $fancyBox->description;
    	$this->sort_id = $fancyBox->sort_id;
    	$this->status = $fancyBox->status;
    }

    public function render()
    {
        return view('livewire.backend.fancy-box.edit-fancy-box')->layout('layouts.backend');
    }

    public function saveRecord(){

      $fancyBox =FancyBox::find($this->editId);
      $fancyBox->category = $this->category;
      $fancyBox->description = $this->desc;
      $fancyBox->sort_id =$this->sort_id;
      $fancyBox->status = $this->status;
      $fancyBox->save();

       return redirect()->route('fancybox');


     }  
}
