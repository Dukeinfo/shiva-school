<?php

namespace App\Http\Livewire\Backend\RotateItems;

use Livewire\Component;
use App\Models\RotateItem;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class EditRotateItem extends Component
{
    use UploadTrait;	
	use WithFileUploads;

    public $editId,$image,$editimage,$title,$desc,$link,$sort,$status;

    public function mount($id)
     {
        $rotateItem = RotateItem::findOrFail($id);
        $this->editId = $rotateItem->id;
         $this->image = $rotateItem->image;
        $this->thumbnail = $rotateItem->thumbnail;
        $this->title = $rotateItem->title;
        $this->desc = $rotateItem->description;
         $this->link = $rotateItem->link;
    	$this->sort = $rotateItem->sort_id;
    	$this->status = $rotateItem->status;
     } 

     public function saveRecord()
    {

     if(!is_null($this->editimage)){
         $editimage =  $this->editimage;
        // Define folder path
        $folder = '/uploads/coaching';
        $uploadedData = $this->uploadOne($editimage, $folder);  

      $rotateItem = RotateItem::find($this->editId);
      $rotateItem->image = $uploadedData['file_name'];
      $rotateItem->thumbnail = $uploadedData['thumbnail_name'];
      $rotateItem->title = $this->title;
      $rotateItem->description = $this->desc;
      $rotateItem->link = $this->link;
      $rotateItem->sort_id =$this->sort;
      $rotateItem->status = $this->status;
      $rotateItem->save();

       

      }else{

      $rotateItem = RotateItem::find($this->editId);
      $rotateItem->title = $this->title;
      $rotateItem->description = $this->desc;
      $rotateItem->link = $this->link;
      $rotateItem->sort_id =$this->sort;
      $rotateItem->status = $this->status;
      $rotateItem->save();

     }

     return redirect()->route('rotate_items'); 

    } 
  

    public function render()
    {
        return view('livewire.backend.rotate-items.edit-rotate-item')->layout('layouts.backend');
    }
}
