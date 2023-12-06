<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\CoCurricularFacilities;
use App\Models\CoCurricularImages;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class CoCurricularFacility extends Component
{
    use UploadTrait;	
    use WithFileUploads;

    public $title,$desc,$title_guj,$desc_guj,$link,$sort_id,$status;
    public $multi_images =[];

    protected $rules = [
        'title' => 'required', 
        'desc' => 'required', 
        'title_guj' => 'required',  
        'desc_guj' => 'required',
        'multi_images' => 'required', 
        'sort_id' => 'required| unique:co_curricular_facilities,sort_id',
        'status' => 'required', 
       
      ];
      protected $messages = [
         
          'title.required' => 'Title Required.',
          'title_guj.required' => 'Title Required.',
          'desc.required' => 'Description Required.',
          'desc_guj.required' => 'Description Required.',
          'multi_images.required' => 'Image Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];
   public function addCoCurricular(){
    
      $validatedData = $this->validate();

      $curricular = new CoCurricularFacilities();
      $curricular->title = $this->title;
      $curricular->title_guj = $this->title_guj;
      $curricular->description = $this->desc;
      $curricular->description_guj =trim(str_replace('<pre>', '<p>', $this->desc_guj)) ?? Null;
      $curricular->link = $this->link;
      $curricular->sort_id =$this->sort_id;
      $curricular->status = $this->status;
      $curricular->save();

      if(!is_null($this->multi_images ) && $this->multi_images > 1){

         $folder = '/uploads/multiple_images';
         foreach ($this->multi_images as $img) {
          // Define folder path
          $uploadedData = $this->uploadOne($img, $folder);
          $curricularImages = new CoCurricularImages();
          $curricularImages->co_curricular_facility_id = $curricular->id;
          $curricularImages->multi_images =  $uploadedData['file_name']?? NULL;
          $curricularImages->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
          $curricularImages->link = $this->link;;
          $curricularImages->status = $this->status;
          $curricularImages->ip_address = getUserIp();
          $curricularImages->login = authUserId();
          $curricularImages->save();
 
       }
      }

       $this->resetFormFields();
       // Emit the 'formSubmitted' event
       $this->emit('formSubmitted');
       
       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

   }


    private function resetFormFields(){
    $this->title = '';
    $this->desc = '';
    $this->link = '';
    $this->sort_id = '';
    $this->status = '';
    $this->multi_images =null; 
   }

  
     public function delete($id){

      $cocurricular = CoCurricularFacilities::findOrFail($id);
      if(!is_null($cocurricular)){
         $cocurricular->status = 'Inactive';
         $cocurricular->save();
      }

     }

    public function render()
    {
      $this->records = CoCurricularFacilities::orderBy('sort_id','asc')->get();
        return view('livewire.backend.facilities.co-curricular-facility')->layout('layouts.backend');
    }
}
