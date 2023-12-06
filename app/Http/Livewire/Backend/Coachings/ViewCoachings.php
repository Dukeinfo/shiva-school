<?php

namespace App\Http\Livewire\Backend\Coachings;

use Livewire\Component;
use App\Models\Coachings;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class ViewCoachings extends Component
{

	  use UploadTrait;	
	  use WithFileUploads;

    public $image,$title,$desc,$title_guj,$desc_guj,$link,$sort,$status;

    //'image' => 'required|dimensions:width=700,height=900',

    protected $rules = [
        'image' => 'required|dimensions:min_width=700,min_height=900', 
        'title' => 'required', 
        'desc' => 'required', 
        'title_guj' => 'required', 
        'desc_guj' => 'required', 
        'sort' => 'required| unique:coachings,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'image.required' => 'Image Required.',
          'title.required' => 'Title Required.',
          'desc.required' => 'Message Required.',
          'title_guj.required' => 'Title Required.',
          'desc_guj.required' => 'Message Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->image = '';
        $this->title = '';
        $this->desc = '';
        $this->title_guj = '';
        $this->desc_guj = '';
        $this->link = '';
        $this->sort = '';
        $this->status = '';
    }

   public function addCoachings()
    {

    $validatedData = $this->validate();

     if(!is_null($this->image)){
         $image =  $this->image;
        // Define folder path
        $folder = '/uploads/coaching';
        $uploadedData = $this->uploadOne($image, $folder);   
      }

      $coachings = new Coachings();
      $coachings->image = $uploadedData['file_name'];
      $coachings->thumbnail = $uploadedData['thumbnail_name'];
      $coachings->title = $this->title;
      $coachings->description = $this->desc;
      $coachings->title_guj = $this->title_guj;
      $coachings->description_guj = $this->desc_guj;
      $coachings->link = $this->link;
      $coachings->sort_id =$this->sort;
      $coachings->status = $this->status;
      $coachings->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $coachings = Coachings::findOrFail($id);
      if(!is_null($coachings)){
         $coachings->status = 'Inactive';
         $coachings->save();
      }

     }

    public function render()
    {
    	 $this->records = Coachings::orderBy('sort_id','asc')->get();
        return view('livewire.backend.coachings.view-coachings')->layout('layouts.backend');
    }
}
