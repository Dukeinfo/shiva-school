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
class ViewMemberofTrust extends Component
{

    use UploadTrait;	
    use WithFileUploads;

    public $category,$name,$designation,$desc,$name_guj,$designation_guj,$desc_guj,$image,
    $thumbnail,$link,$sort_id,$status;
 
    protected $rules = [
    	'category' => 'required',
        'name' => 'required', 
        'designation' => 'required', 
        'desc' => 'required', 
        'name_guj' => 'required', 
        'designation_guj' => 'required',  
        'desc_guj' => 'required',
        'image' => 'required', 
        'sort_id' => 'required| unique:member_of_trusts,sort_id', 
        'status' => 'required', 
       
      ];
      protected $messages = [
          'category.required' => 'Category Required.',
          'name.required' => 'Name Required.',
          'designation.required' => 'Designation Required.',
          'desc.required' => 'Description Required.',
          'name_guj.required' => 'Name Required.',
          'designation_guj.required' => 'Designation Required.',
          'desc_guj.required' => 'Description Required.',
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];

    public function addMembers(){
    
      $validatedData = $this->validate();

      if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/members_trust';
      $uploadedData = $this->uploadOne($image, $folder);

      } 

      $members = new MemberOfTrust();
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

       $this->resetFormFields();
       // Emit the 'formSubmitted' event
       $this->emit('formSubmitted');
       
       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

   }  


   private function resetFormFields(){
    $this->name = '';
    $this->designation = '';
    $this->desc = '';
    $this->name_guj = '';
    $this->designation_guj = '';
    $this->desc_guj = '';
    $this->link = '';
    $this->sort_id = '';
    $this->status = '';
    $this->image =null; 
   }

    public function delete($id){

     $members = MemberOfTrust::findOrFail($id);
      if(!is_null($members)){
         $members->status = 'Inactive';
         $members->save();
      }

    }
   
    public function render()
    {
     $this->records = MemberOfTrust::orderBy('sort_id','asc')->get(); 	
        return view('livewire.backend.memberof-trust.view-memberof-trust')->layout('layouts.backend');
    }
}
