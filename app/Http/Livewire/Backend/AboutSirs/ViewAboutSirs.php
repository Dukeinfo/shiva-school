<?php

namespace App\Http\Livewire\Backend\AboutSirs;

use Livewire\Component;
use App\Models\AboutSir;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ViewAboutSirs extends Component
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
    	
      $aboutSir = new AboutSir();
      $aboutSir->heading = $this->heading;
      $aboutSir->sub_heading = $this->sub_heading;
      $aboutSir->description = $this->desc;
      $aboutSir->item1 = $this->item1;
      $aboutSir->item2 = $this->item2;
      $aboutSir->item3 = $this->item3;
      $aboutSir->item4 = $this->item4;
      $aboutSir->link = $this->link;
      $aboutSir->sort_id =$this->sort_id;
      $aboutSir->status = $this->status;
      $aboutSir->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
   
   }   

   public function delete($id){

      $aboutSir = AboutSir::findOrFail($id);
      if(!is_null($aboutSir)){
        $aboutSir->status = 'Inactive';
        $aboutSir->save();
      }

     }

    public function render()
    {
    	$this->records = AboutSir::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.about-sirs.view-about-sirs')->layout('layouts.backend');
    }
}
