<?php

namespace App\Http\Livewire\Backend\SchoolInfo;

use Livewire\Component;
use App\Models\SchoolImage;
use App\Traits\UploadTrait;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class EditSchoolImage extends Component
{
   use WithFileUploads;
   use UploadTrait;

    public $editId,$image,$thumbnail,$editimage,$sort,$status;

      public function mount($id)
     {
        $schoolImage = SchoolImage::findOrFail($id);
        $this->editId = $schoolImage->id;
        $this->thumbnail = $schoolImage->thumbnail;
        $this->image = $schoolImage->image;
    	$this->sort = $schoolImage->sort_id;
    	$this->status = $schoolImage->status;
     }

      public function saveRecord() {

        if(!is_null($this->editimage)){
            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/schoolinfo';
            $uploadedData = $this->uploadOne($image, $folder);
		     
		     $schoolImage =  SchoolImage::find($this->editId);
		     $schoolImage->image = $uploadedData['file_name'] ?? NULL;
		     $schoolImage->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
		      $schoolImage->sort_id =$this->sort;
		      $schoolImage->status = $this->status;
		      $schoolImage->save(); 
 
        }
        else{
          
            
        }
        return redirect()->route('school_image'); 

     }
 


    public function render()
    {
        return view('livewire.backend.school-info.edit-school-image')->layout('layouts.backend');
    }
}
