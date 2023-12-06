<?php

namespace App\Http\Livewire\Backend\AboutSirs;

use Livewire\Component;
use App\Models\AboutSir;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class EditAboutSirs extends Component
{
	use UploadTrait;	
    use WithFileUploads;

    public $editId,$heading,$sub_heading,$desc,$item1,$item2,$item3,$item4,$link,$sort_id,$status;

     public function mount($id)
     {
        $aboutSir = AboutSir::findOrFail($id);
        $this->editId = $aboutSir->id;
        $this->heading = $aboutSir->heading;
        $this->sub_heading = $aboutSir->sub_heading;
        $this->desc = $aboutSir->description;
        $this->item1 = $aboutSir->item1;
    	$this->item2 = $aboutSir->item2;
    	$this->item3 = $aboutSir->item3;
        $this->item4 = $aboutSir->item4;
        $this->link = $aboutSir->link;
        $this->sort_id = $aboutSir->sort_id;
        $this->status = $aboutSir->status;
     }

     public function saveRecord(){

      $aboutSir =AboutSir::find($this->editId);
      $aboutSir->heading = $this->heading;
      $aboutSir->sub_heading = $this->sub_heading;
      $aboutSir->description = $this->desc;
      $aboutSir->item1 = $this->item1;
      $aboutSir->item2 = $this->item2;
      $aboutSir->item3 = $this->item3;
      $aboutSir->item4 = $this->item4;
      $aboutSir->link = $this->link;
      $aboutSir->sort_id =$this->sort_id;
      $aboutSir->status = $this->status;
      $aboutSir->save();

      return redirect()->route('about_sirs');
   
   }     

    public function render()
    {
        return view('livewire.backend.about-sirs.edit-about-sirs')->layout('layouts.backend');
    }
}
