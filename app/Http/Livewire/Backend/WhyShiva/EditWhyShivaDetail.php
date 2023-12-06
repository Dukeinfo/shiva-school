<?php

namespace App\Http\Livewire\Backend\WhyShiva;

use Livewire\Component;
use App\Models\WhyShivaDetail;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class EditWhyShivaDetail extends Component
{
   public $editId,$heading,$sub_heading,$desc,$item1,$item2,$item3,$item4,$link,$sort_id,$status;

     public function mount($id)
     {
        $whyShivaDetail = WhyShivaDetail::findOrFail($id);
        $this->editId = $whyShivaDetail->id;
        $this->heading = $whyShivaDetail->heading;
        $this->sub_heading = $whyShivaDetail->sub_heading;
        $this->desc = $whyShivaDetail->description;
        $this->item1 = $whyShivaDetail->item1;
    	$this->item2 = $whyShivaDetail->item2;
    	$this->item3 = $whyShivaDetail->item3;
        $this->item4 = $whyShivaDetail->item4;
        $this->link = $whyShivaDetail->link;
        $this->sort_id = $whyShivaDetail->sort_id;
        $this->status = $whyShivaDetail->status;
     }

     public function saveRecord(){

      $WhyShivaDetail =WhyShivaDetail::find($this->editId);
      $WhyShivaDetail->heading = $this->heading;
      $WhyShivaDetail->sub_heading = $this->sub_heading;
      $WhyShivaDetail->description = $this->desc;
      $WhyShivaDetail->item1 = $this->item1;
      $WhyShivaDetail->item2 = $this->item2;
      $WhyShivaDetail->item3 = $this->item3;
      $WhyShivaDetail->item4 = $this->item4;
      $WhyShivaDetail->link = $this->link;
      $WhyShivaDetail->sort_id =$this->sort_id;
      $WhyShivaDetail->status = $this->status;
      $WhyShivaDetail->save();

      return redirect()->route('view_whyshiva_detail');
   
   }     


    public function render()
    {
        return view('livewire.backend.why-shiva.edit-why-shiva-detail')->layout('layouts.backend');
    }
}
