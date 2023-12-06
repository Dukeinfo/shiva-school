<?php

namespace App\Http\Livewire\Backend\RotateItems;

use Livewire\Component;
use App\Models\RotateItem;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class ViewRotateItem extends Component
{

  use UploadTrait;	
	use WithFileUploads;

    public $image,$title,$desc,$link,$sort,$status;

    protected $rules = [
        'image' => 'required|dimensions:min_width=700,min_height=800', 
        'title' => 'required', 
        'desc' => 'required', 
        'sort' => 'required| unique:rotate_items,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'image.required' => 'Image Required.',
          'title.required' => 'Title Required.',
          'desc.required' => 'Message Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->image = '';
        $this->title = '';
        $this->desc = '';
        $this->link = '';
        $this->sort = '';
        $this->status = '';
    }

    public function saveRecord()
    {

    $validatedData = $this->validate();

     if(!is_null($this->image)){
         $image =  $this->image;
        // Define folder path
        $folder = '/uploads/coaching';
        $uploadedData = $this->uploadOne($image, $folder);   
      }

      $rotateItem = new RotateItem();
      $rotateItem->image = $uploadedData['file_name'];
      $rotateItem->thumbnail = $uploadedData['thumbnail_name'];
      $rotateItem->title = $this->title;
      $rotateItem->description = $this->desc;
      $rotateItem->link = $this->link;
      $rotateItem->sort_id =$this->sort;
      $rotateItem->status = $this->status;
      $rotateItem->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $rotateItem = RotateItem::findOrFail($id);
      if(!is_null($rotateItem)){
         $rotateItem->status = 'Inactive';
         $rotateItem->save();
      }

     }

    public function render()
    {
    	$this->records = RotateItem::orderBy('sort_id','asc')->get();

        return view('livewire.backend.rotate-items.view-rotate-item')->layout('layouts.backend')->layout('layouts.backend');
    }
}
