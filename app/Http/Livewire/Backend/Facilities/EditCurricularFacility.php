<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\CurricularFacilities;
use App\Models\CurricularImages;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class EditCurricularFacility extends Component
{
    use UploadTrait;	
    use WithFileUploads;

    public $editId,$title,$desc,$title_guj,$desc_guj,$link,$sort_id,$status;
    public $edit_multi_images =[];

    public function mount($id){
        $curricular = CurricularFacilities::findOrFail($id);
        $this->editId = $curricular->id;
        $this->title = $curricular->title;
        $this->title_guj = $curricular->title_guj;
        $this->desc = $curricular->description;
        $this->desc_guj = $curricular->description_guj;
        $this->sort_id = $curricular->sort_id;
    	$this->status = $curricular->status;
     } 

    public function addCurricular(){

      $curricular =CurricularFacilities::find($this->editId);
      $curricular->title = $this->title;
      $curricular->title_guj = $this->title_guj;
      $curricular->description = $this->desc;
      $curricular->description_guj = trim(str_replace('<pre>', '<p>', $this->desc_guj)) ?? Null;
      $curricular->link = $this->link;
      $curricular->sort_id =$this->sort_id;
      $curricular->status = $this->status;
      $curricular->save();

      //edit multiple images	
      if(!is_null($this->edit_multi_images ) && $this->edit_multi_images > 1){
         $folder = '/uploads/multiple_images';
         foreach ($this->edit_multi_images as $img) {
          // Define folder path
          $uploadedData = $this->uploadOne($img, $folder);
          $curricularImages = new CurricularImages();
          $curricularImages->curricular_facility_id = $curricular->id;
          $curricularImages->multi_images =  $uploadedData['file_name']?? NULL;
          $curricularImages->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
          $curricularImages->link = $this->link;;
          $curricularImages->status = $this->status;
          $curricularImages->ip_address = getUserIp();
          $curricularImages->login = authUserId();
          $curricularImages->save();
 
       }
      }
  
      return redirect()->route('view_curricular_facility');  

    }  

     public function deletemultiple($id){
        $image = CurricularImages::where('id',$id)->delete();
     }  

	    public function render()
	    {
	    	$this->getMultiple =    CurricularImages::where('curricular_facility_id' ,  $this->editId)->get();

	        return view('livewire.backend.facilities.edit-curricular-facility')->layout('layouts.backend');
	    }
}
