<?php

namespace App\Http\Livewire\Backend\WhyShiva;

use Livewire\Component;
use App\Models\WhyShivaSlider;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ViewWhyShivaSlider extends Component
{
	use UploadTrait;	
    use WithFileUploads;

    public $title,$desc,$image,$link,$sort,$status;

    protected $rules = [
        'title' => 'required',  
        'desc' => 'required', 
        'image' => 'required',
        'sort' => 'required| unique:why_shiva_sliders,sort_id', 
        'status' => 'required', 
       
      ];
      protected $messages = [
          'title.required' => 'Title Required.',
          'desc.required' => 'Description Required.',
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
      ];

   private function resetInputFields(){
    $this->title = '';
    $this->desc = '';
    $this->image = '';
    $this->link = '';
    $this->sort = '';
    $this->status = '';
    
   }

   public function saveRecord(){
 
     $validatedData = $this->validate();
     if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/whyshivaslider';
      $uploadedData = $this->uploadOne($image, $folder);

    } 
    	
      $WhyShivaSlider = new WhyShivaSlider();
      $WhyShivaSlider->image = $uploadedData['file_name'] ?? NULL;
      $WhyShivaSlider->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $WhyShivaSlider->title = $this->title;
      $WhyShivaSlider->description = $this->desc;
      $WhyShivaSlider->link = $this->link;
      $WhyShivaSlider->sort_id =$this->sort;
      $WhyShivaSlider->status = $this->status;
      $WhyShivaSlider->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
   
   }   

   public function delete($id){

      $whyShivaSlider = WhyShivaSlider::findOrFail($id);
      if(!is_null($whyShivaSlider)){
        $whyShivaSlider->status = 'Inactive';
        $whyShivaSlider->save();
      }

     }


    public function render()
    {
    	$this->records = WhyShivaSlider::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.why-shiva.view-why-shiva-slider')->layout('layouts.backend');
    }
}
