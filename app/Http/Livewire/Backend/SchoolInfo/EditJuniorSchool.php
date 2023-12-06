<?php

namespace App\Http\Livewire\Backend\SchoolInfo;

use Livewire\Component;
use App\Models\JuniorSchool;
use App\Traits\UploadTrait;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditJuniorSchool extends Component
{
	use WithFileUploads;
    use UploadTrait;
    public  $editId,$heading,$desc,$image,$thumbnail,$editimage,$link,$sort,$status;
      public function mount($id)
     {
        $juniorSchool = JuniorSchool::findOrFail($id);
        $this->editId = $juniorSchool->id;
        $this->heading = $juniorSchool->heading;
        $this->desc = $juniorSchool->description;
        $this->thumbnail = $juniorSchool->thumbnail;
        $this->image = $juniorSchool->image;
        $this->link = $juniorSchool->link;
    	$this->sort = $juniorSchool->sort_id;
    	$this->status = $juniorSchool->status;
     }
 

    public function saveRecord() {

        if(!is_null($this->editimage)){
            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/schoolinfo';
            $uploadedData = $this->uploadOne($image, $folder);
		     
		      $juniorSchool =JuniorSchool::find($this->editId);
		      $juniorSchool->heading =$this->heading;
		      $juniorSchool->description =$this->desc;
		      $juniorSchool->image = $uploadedData['file_name'] ?? NULL;
		      $juniorSchool->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
		      $juniorSchool->sort_id =$this->sort;
		      $juniorSchool->status = $this->status;
		      $juniorSchool->save();  
        }
        else{
          
              $juniorSchool =JuniorSchool::find($this->editId);
		      $juniorSchool->heading =$this->heading;
		      $juniorSchool->description =$this->desc;
		      $juniorSchool->sort_id =$this->sort;
		      $juniorSchool->status = $this->status;
		      $juniorSchool->save();
        }
        return redirect()->route('junior_school'); 

     }
 

    public function render()
    {
        return view('livewire.backend.school-info.edit-junior-school')->layout('layouts.backend');
    }
}
