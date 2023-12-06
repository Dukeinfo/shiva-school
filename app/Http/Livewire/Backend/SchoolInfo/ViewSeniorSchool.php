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

class ViewSeniorSchool extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public  $heading,$desc,$image,$link,$sort,$status;

      protected $rules = [
      	'heading' => 'required',
      	'desc' => 'required',
        'image' => 'required', 
        'sort' => 'required| unique:senior_schools,sort_id', 
        'status' => 'required', 
       
     
      ];
      protected $messages = [
      	 'heading.required' => 'Heading Required.',
         'desc.required' => 'Description Required.',
         'image.required' => 'Image Required.',
         'sort.required' => 'Sort Required.',
         'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
    	$this->heading = '';
    	$this->desc = '';
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

      $seniorSchool = new SeniorSchool();
      $seniorSchool->heading =$this->heading;
      $seniorSchool->description =$this->desc;
      $seniorSchool->image = $uploadedData['file_name'] ?? NULL;
      $seniorSchool->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $seniorSchool->link =$this->link;
      $seniorSchool->sort_id =$this->sort;
      $seniorSchool->status = $this->status;
      $seniorSchool->save();
      
       $this->resetInputFields();
       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 


   }

   public function delete($id){

      $seniorSchool = SeniorSchool::findOrFail($id);
      if(!is_null($seniorSchool)){
         $seniorSchool->status = 'Inactive';
         $seniorSchool->save();
      }

     }


    public function render()
    {
    	$this->records =  SeniorSchool::orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.school-info.view-senior-school')->layout('layouts.backend');
    }
}
