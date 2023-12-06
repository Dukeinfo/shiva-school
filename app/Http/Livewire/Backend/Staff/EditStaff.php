<?php

namespace App\Http\Livewire\Backend\Staff;

use Livewire\Component;
use App\Models\Department;
use App\Models\Staff;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;

class EditStaff extends Component
{
  use UploadTrait;

    use WithFileUploads;
    public $staff_id,$department_id,$name,$name_guj, $departments, $description,$description_guj,
    $designation,$designation_guj, $image,$thumbnail, $editimage,$sort,$status;

    public function mount($id)
     {
        $staff = Staff::findOrFail($id);
        $this->staff_id = $staff->id;
        $this->department_id = $staff->department_id;
        $this->name = $staff->name;
        $this->designation = $staff->designation;
        $this->description = $staff->description;
        $this->name_guj = $staff->name_guj;
        $this->designation_guj = $staff->designation_guj;
        $this->description_guj = $staff->description_guj;
        $this->image = $staff->image;
        $this->thumbnail = $staff->thumbnail;
    	  $this->sort = $staff->sort_id;
    	  $this->status = $staff->status;
     }

     public function editStaff(){
     if(!is_null($this->editimage)){
      $image =  $this->editimage;
      $folder = '/uploads/staff';
      $uploadedData = $this->uploadOne($image, $folder);
      $staff = Staff::find($this->staff_id);
      $staff->image =  $uploadedData['file_name']?? NULL;
      $staff->thumbnail =  $uploadedData['thumbnail_name']?? NULL;
      $staff->save();

    }  
    else{
      $staff = Staff::find($this->staff_id);
      $staff->department_id= $this->department_id ?? NULL;
      $staff->name = $this->name ?? NULL;
      $staff->designation = $this->designation ?? NULL;
      $staff->description = $this->description ?? NULL;
      $staff->name_guj = $this->name_guj ?? NULL;
      $staff->designation_guj = $this->designation_guj ?? NULL;
      $staff->description_guj = $this->description_guj ?? NULL;
      $staff->sort_id =$this->sort ?? NULL;
      $staff->status = $this->status ?? NULL;
      $staff->save();

    }
    return redirect()->route('view_staff');  
   }

    public function render()
    {
      	$this->departments = Department::get();
        return view('livewire.backend.staff.edit-staff')->layout('layouts.backend');
    }
}
