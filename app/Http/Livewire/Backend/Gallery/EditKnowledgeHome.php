<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\KnowledgeHome;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
class EditKnowledgeHome extends Component
{

   use UploadTrait; 
   use WithFileUploads;

   public $knowledgeId,$image,$editimage,$title,$desc,$title_guj,$desc_guj,$link,$sort_id,$status ,$sort;

    public function mount($id)
     {
        $knowledgeHome = KnowledgeHome::findOrFail($id);
        $this->knowledgeId = $knowledgeHome->id;
         $this->image = $knowledgeHome->image;
        $this->thumbnail = $knowledgeHome->thumbnail;
        $this->title = $knowledgeHome->title;
        $this->desc = $knowledgeHome->description;
         $this->title_guj = $knowledgeHome->title_guj;
        $this->desc_guj = $knowledgeHome->description_guj;
        $this->link = $knowledgeHome->link;
    	$this->sort = $knowledgeHome->sort_id;
    	$this->status = $knowledgeHome->status;
     }

     public function editKnowledgeHome()
    {

    if(!is_null($this->editimage)){
         $editimage =  $this->editimage;
        // Define folder path
        $folder = '/uploads/knowledgehome';
        $uploadedData = $this->uploadOne($editimage, $folder); 
      
      $knowledgeHome = KnowledgeHome::find($this->knowledgeId);
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

      }else{

      $knowledgeHome = KnowledgeHome::find($this->knowledgeId);
      $knowledgeHome->title = $this->title;
      $knowledgeHome->description = $this->desc;
      $knowledgeHome->title_guj = $this->title_guj;
      $knowledgeHome->description_guj = $this->desc_guj;
      $knowledgeHome->link = $this->link;
      $knowledgeHome->sort_id =$this->sort_id;
      $knowledgeHome->status = $this->status;
      $knowledgeHome->save();

      }

      return redirect()->route('view_knowledge_home'); 

    
    } 

    public function render()
    {
        return view('livewire.backend.gallery.edit-knowledge-home')->layout('layouts.backend');
    }
}
