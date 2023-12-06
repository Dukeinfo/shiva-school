<?php

namespace App\Http\Livewire\Backend\SchoolInfo;

use Livewire\Component;
use App\Models\SeniorSchool;
use App\Traits\UploadTrait;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditSeniorSchool extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public  $editId,$heading,$desc,$image,$thumbnail,$editimage,$link,$sort,$status;

    public function mount($id)
     {
        $seniorSchool = SeniorSchool::findOrFail($id);
        $this->editId = $seniorSchool->id;
        $this->heading = $seniorSchool->heading;
        $this->desc = $seniorSchool->description;
        $this->thumbnail = $seniorSchool->thumbnail;
        $this->image = $seniorSchool->image;
        $this->link = $seniorSchool->link;
    	$this->sort = $seniorSchool->sort_id;
    	$this->status = $seniorSchool->status;
     }
 

    public function saveRecord() {

        if(!is_null($this->editimage)){
            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/schoolinfo';
            $uploadedData = $this->uploadOne($image, $folder);
		     
		      $seniorSchool =SeniorSchool::find($this->editId);
		      $seniorSchool->heading =$this->heading;
		      $seniorSchool->description =$this->desc;
		      $seniorSchool->image = $uploadedData['file_name'] ?? NULL;
		      $seniorSchool->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
		      $seniorSchool->sort_id =$this->sort;
		      $seniorSchool->status = $this->status;
		      $seniorSchool->save();  
        }
        else{
          
              $seniorSchool =SeniorSchool::find($this->editId);
		      $seniorSchool->heading =$this->heading;
		      $seniorSchool->description =$this->desc;
		      $seniorSchool->sort_id =$this->sort;
		      $seniorSchool->status = $this->status;
		      $seniorSchool->save();
        }
        return redirect()->route('senior_school'); 

     }
 

    public function render()
    {
        return view('livewire.backend.school-info.edit-senior-school')->layout('layouts.backend');
    }
}
