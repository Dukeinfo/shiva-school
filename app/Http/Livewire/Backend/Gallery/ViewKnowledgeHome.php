<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\KnowledgeHome;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
class ViewKnowledgeHome extends Component
{

   use UploadTrait; 
   use WithFileUploads;

    public $image,$title,$desc,$title_guj,$desc_guj,$link,$sort_id,$status;

    protected $rules = [
        'image' => 'required', 
        'title' => 'required',
        'desc' => 'required',
        'title_guj' => 'required',
        'desc_guj' => 'required',
        'sort_id' => 'required| unique:knowledge_homes,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'image.required' => 'Image Required.',
          'title.required' => 'Title Required.',
          'desc.required' => 'Description Required.',
          'title_guj.required' => 'Title Required.',
          'desc_guj.required' => 'Description Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->image = '';
        $this->title = '';
        $this->desc = '';
        $this->title_guj = '';
        $this->desc_guj = '';
        $this->link = '';
        $this->sort_id = '';
        $this->status = '';
    }

   public function addKnowledgeHome()
    {

      $validatedData = $this->validate();

      if(!is_null($this->image)){
         $image =  $this->image;
        // Define folder path
        $folder = '/uploads/knowledgehome';
        $uploadedData = $this->uploadOne($image, $folder);   
      }

      $knowledgeHome = new KnowledgeHome();
      $knowledgeHome->image = $uploadedData['file_name'];
      $knowledgeHome->thumbnail = $uploadedData['thumbnail_name'];
      $knowledgeHome->title = $this->title;
      $knowledgeHome->description = $this->desc;
      $knowledgeHome->title_guj = $this->title_guj;
      $knowledgeHome->description_guj = $this->desc_guj;
      $knowledgeHome->link = $this->link;
      $knowledgeHome->sort_id =$this->sort_id;
      $knowledgeHome->status = $this->status;
      $knowledgeHome->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $knowledgeHome = KnowledgeHome::findOrFail($id);
      if(!is_null($knowledgeHome)){
        $knowledgeHome->status = 'Inactive';
        $knowledgeHome->save();
      }

     }


    public function render()
    {
    	$this->records = KnowledgeHome::orderBy('sort_id','asc')->get();
        return view('livewire.backend.gallery.view-knowledge-home')->layout('layouts.backend');
    }
}
