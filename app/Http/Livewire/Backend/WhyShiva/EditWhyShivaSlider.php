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

class EditWhyShivaSlider extends Component
{
	use UploadTrait;	
    use WithFileUploads;

    public $editId,$title,$desc,$image,$thumbnail,$editimage,$link,$sort,$status;
    
      public function mount($id)
     {
        $whyShivaSlider = WhyShivaSlider::findOrFail($id);
        $this->editId = $whyShivaSlider->id;
        $this->thumbnail = $whyShivaSlider->thumbnail;
        $this->image = $whyShivaSlider->image;
        $this->title = $whyShivaSlider->title;
        $this->desc = $whyShivaSlider->description;
        $this->link = $whyShivaSlider->link;
    	$this->sort = $whyShivaSlider->sort_id;
    	$this->status = $whyShivaSlider->status;
     }

     public function saveRecord() {

        if(!is_null($this->editimage)){
            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/whyshivaslider';
            $uploadedData = $this->uploadOne($image, $folder);
		     
	      $WhyShivaSlider =WhyShivaSlider::find($this->editId);
	      $WhyShivaSlider->image = $uploadedData['file_name'] ?? NULL;
	      $WhyShivaSlider->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
	      $WhyShivaSlider->title = $this->title;
	      $WhyShivaSlider->description = $this->desc;
	      $WhyShivaSlider->link = $this->link;
	      $WhyShivaSlider->sort_id =$this->sort;
	      $WhyShivaSlider->status = $this->status;
	      $WhyShivaSlider->save();
        }
        else{
          $WhyShivaSlider =WhyShivaSlider::find($this->editId);
	      $WhyShivaSlider->title = $this->title;
	      $WhyShivaSlider->description = $this->desc;
	      $WhyShivaSlider->link = $this->link;
	      $WhyShivaSlider->sort_id =$this->sort;
	      $WhyShivaSlider->status = $this->status;
	      $WhyShivaSlider->save();
        }
        return redirect()->route('view_whyshiva_slider'); 

     }
 


    public function render()
    {
        return view('livewire.backend.why-shiva.edit-why-shiva-slider')->layout('layouts.backend');
    }
}
