<?php

namespace App\Http\Livewire\Backend\MemberofTrust;

use Livewire\Component;
use App\Models\MemberOfTrust;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
class EditMemberofTrust extends Component
{
    use UploadTrait;	
    use WithFileUploads;

    public $editId,$category,$name,$designation,$desc,$name_guj,$designation_guj,$desc_guj,$image,
    $thumbnail,$editimage,$link,$sort_id,$status;
 
   public function mount($id){
        $members = MemberOfTrust::findOrFail($id);
        $this->editId = $members->id;
        $this->category = $members->category;
        $this->name = $members->name;
        $this->designation = $members->designation;
        $this->desc = $members->description;
        $this->name_guj = $members->name_guj;
        $this->designation_guj = $members->designation_guj;
        $this->desc_guj = $members->description_guj;
        $this->link = $members->link;
        $this->image = $members->image;
        $this->thumbnail = $members->thumbnail;
        $this->sort_id = $members->sort_id;
    	$this->status = $members->status;
     } 

   public function addMembers(){
    
      if(!is_null($this->editimage)){
      $image =  $this->editimage;
      // Define folder path
      $folder = '/uploads/members_trust';
      $uploadedData = $this->uploadOne($image, $folder);

      $members =MemberOfTrust::find($this->editId);
      $members->category = $this->category;
      $members->name = $this->name;
      $members->designation = $this->designation;
      $members->description = $this->desc;
      $members->name_guj = $this->name_guj;
      $members->designation_guj = $this->designation_guj;
      $members->description_guj = trim(str_replace('<pre>', '<p>', $this->desc_guj)) ?? Null;
      $members->image = $uploadedData['file_name'] ?? NULL;
      $members->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $members->link = $this->link;
      $members->sort_id =$this->sort_id;
      $members->status = $this->status;
      $members->save();

      }else{ 

      $members =MemberOfTrust::find($this->editId);
      $members->category = $this->category;
      $members->name = $this->name;
      $members->designation = $this->designation;
      $members->description = $this->desc;
      $members->name_guj = $this->name_guj;
      $members->designation_guj = $this->designation_guj;
      $members->description_guj = trim(str_replace('<pre>', '<p>', $this->desc_guj)) ?? Null;
      $members->link = $this->link;
      $members->sort_id =$this->sort_id;
      $members->status = $this->status;
      $members->save();

      }

      return redirect()->route('view_memberof_trust');  

     }  


    public function render()
    {
        return view('livewire.backend.memberof-trust.edit-memberof-trust')->layout('layouts.backend');
    }
}
