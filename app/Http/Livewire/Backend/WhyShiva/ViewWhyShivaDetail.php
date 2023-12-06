<?php

namespace App\Http\Livewire\Backend\WhyShiva;

use Livewire\Component;
use App\Models\WhyShivaDetail;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;


class ViewWhyShivaDetail extends Component
{
    use UploadTrait;	
    use WithFileUploads;

    public $heading,$sub_heading,$desc,$item1,$item2,$item3,$item4,$link,$sort_id,$status;

     protected $rules = [
        'heading' => 'required',
        'sub_heading' => 'required',  
        'desc' => 'required', 
        'sort_id' => 'required| unique:about_sirs,sort_id', 
        'status' => 'required', 
       
      ];
      protected $messages = [
          'heading.required' => 'Heading Required.',
          'sub_heading.required' => 'Sub Heading Required.',
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
      ];

   private function resetInputFields(){
    $this->heading = '';
    $this->sub_heading = '';
    $this->desc = '';
    $this->link = '';
    $this->sort_id = '';
    $this->status = '';
    
   }

   public function saveRecord(){
      $validatedData = $this->validate();
    	
      $WhyShivaDetail = new WhyShivaDetail();
      $WhyShivaDetail->heading = $this->heading;
      $WhyShivaDetail->sub_heading = $this->sub_heading;
      $WhyShivaDetail->description = $this->desc;
      $WhyShivaDetail->item1 = $this->item1;
      $WhyShivaDetail->item2 = $this->item2;
      $WhyShivaDetail->item3 = $this->item3;
      $WhyShivaDetail->item4 = $this->item4;
      $WhyShivaDetail->link = $this->link;
      $WhyShivaDetail->sort_id =$this->sort_id;
      $WhyShivaDetail->status = $this->status;
      $WhyShivaDetail->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
   
   }   

   public function delete($id){

      $whyShivaDetail = WhyShivaDetail::findOrFail($id);
      if(!is_null($whyShivaDetail)){
        $whyShivaDetail->status = 'Inactive';
        $whyShivaDetail->save();
      }

     }
 

    public function render()
    {
    $this->records = WhyShivaDetail::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.why-shiva.view-why-shiva-detail')->layout('layouts.backend');
    }
}
