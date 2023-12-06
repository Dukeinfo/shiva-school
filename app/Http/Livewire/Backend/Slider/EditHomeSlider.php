<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class EditHomeSlider extends Component
{

use WithFileUploads;
use UploadTrait;

    public $sliderId,$sort,$image,$editimage, $status ,$thumbnail; 

     public function mount($id){
        $slider = Slider::findOrFail($id);
        $this->sliderId = $slider->id;
        $this->image = $slider->image;
        $this->thumbnail = $slider->thumbnail;
        $this->sort = $slider->sort_id;
    	$this->status = $slider->status;
     }


     public function editSlider() {
        if(!is_null($this->editimage)){

            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/slider';
            $uploadedData = $this->uploadOne($image, $folder);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;

            $slider = Slider::find($this->sliderId);
            $slider->image = $uploadedData['file_name']?? NULL;
            $slider->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
            $slider->sort_id =$this->sort ?? NULL;
            $slider->status = $this->status ?? NULL;
            $slider->save();
           
 
        }
        else{
            $slider = Slider::find($this->sliderId);
            $slider->sort_id =$this->sort;
            $slider->status = $this->status;
            $slider->save();
           
        }
        return redirect()->route('view_home_slider'); 

     }



    public function render(){

    	
        return view('livewire.backend.slider.edit-home-slider')->layout('layouts.backend');
    }
}
