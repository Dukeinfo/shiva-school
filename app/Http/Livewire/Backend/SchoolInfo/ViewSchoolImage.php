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


class ViewSchoolImage extends Component
{
	use WithFileUploads;
    use UploadTrait;
    public  $image,$sort,$status;
 
  protected $rules = [
        'image' => 'required', 
        'sort' => 'required| unique:school_images,sort_id', 
        'status' => 'required', 
       
     
      ];
      protected $messages = [
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->image = '';
        $this->sort = '';
        $this->status = '';
    }

     public function saveRecord(){

     $validatedData = $this->validate();
     if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/schoolinfo';
      $uploadedData = $this->uploadOne($image, $folder);

    } 

      $schoolImage = new SchoolImage();
      $schoolImage->image = $uploadedData['file_name'] ?? NULL;
      $schoolImage->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $schoolImage->sort_id =$this->sort;
      $schoolImage->status = $this->status;
      $schoolImage->save();
      
     
       $this->resetInputFields();
       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    


   }

   public function delete($id){

      $schoolImage = SchoolImage::findOrFail($id);
      if(!is_null($schoolImage)){
         $schoolImage->status = 'Inactive';
         $schoolImage->save();
      }

     }

    public function render()
    {
     $this->records =  SchoolImage::orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.school-info.view-school-image')->layout('layouts.backend');
    }
}
