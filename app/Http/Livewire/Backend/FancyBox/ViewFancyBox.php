<?php

namespace App\Http\Livewire\Backend\FancyBox;

use Livewire\Component;
use App\Models\FancyBox;

class ViewFancyBox extends Component
{
   public $category,$desc,$sort_id,$status; 

    protected $rules = [
        'category' => 'required| unique:fancy_boxes,category', 
        'desc' => 'required', 
        'sort_id' => 'required| unique:fancy_boxes,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'category.required' => 'Category Required.',
          'desc.required' => 'Detail Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->category = '';
        $this->desc = '';
        $this->sort_id = '';
        $this->status = '';
    }

    public function render()
    {
       $this->records = FancyBox::orderBy('sort_id','asc')->get();

        return view('livewire.backend.fancy-box.view-fancy-box')->layout('layouts.backend');
    }

     public function saveRecord(){

      $fancyBox = new FancyBox();
      $fancyBox->category = $this->category;
      $fancyBox->description = $this->desc;
      $fancyBox->sort_id =$this->sort_id;
      $fancyBox->status = $this->status;
      $fancyBox->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);

     }

     public function delete($id){

      $fancyBox = FancyBox::findOrFail($id);
      if(!is_null($fancyBox)){
        $fancyBox->status = 'Inactive';
        $fancyBox->save();
      }

     }  	
}
