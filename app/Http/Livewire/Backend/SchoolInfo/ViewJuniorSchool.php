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

class ViewJuniorSchool extends Component
{
	use WithFileUploads;
    use UploadTrait;
    public  $heading,$desc,$image,$link,$sort,$status;

      protected $rules = [
      	'heading' => 'required',
      	'desc' => 'required',
        'image' => 'required', 
        'sort' => 'required| unique:junior_schools,sort_id', 
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

      $juniorSchool = new JuniorSchool();
      $juniorSchool->heading =$this->heading;
      $juniorSchool->description =$this->desc;
      $juniorSchool->image = $uploadedData['file_name'] ?? NULL;
      $juniorSchool->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $juniorSchool->link =$this->link;
      $juniorSchool->sort_id =$this->sort;
      $juniorSchool->status = $this->status;
      $juniorSchool->save();
      
       $this->resetInputFields();
       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 


   }

   public function delete($id){

      $juniorSchool = JuniorSchool::findOrFail($id);
      if(!is_null($juniorSchool)){
         $juniorSchool->status = 'Inactive';
         $juniorSchool->save();
      }

     }


    public function render()
    {
    $this->records =  JuniorSchool::orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.school-info.view-junior-school')->layout('layouts.backend');
    }
}
