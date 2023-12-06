<?php

namespace App\Http\Livewire\Backend\Whyus;

use App\Models\MultipleImages;
use Livewire\Component;
use App\Models\Whyus;
use App\Models\WhyusItem;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class WhyusPage extends Component
{
    use UploadTrait;	
    use WithFileUploads;

    public $category,$title,$sub_title,$title_guj,$sub_title_guj,$image,$desc,$desc_guj,$link,$sort_id,$status,$yearexcellence,$expteachers,$notalumna;
    public $item ,$records ,$multi_images =[];

    protected $rules = [
        'category' => 'required| unique:whyuses,category',
        'title' => 'required',  
        'sub_title' => 'required', 
        'desc' => 'required', 
        'title_guj' => 'required',  
        'sub_title_guj' => 'required', 
        'desc_guj' => 'required', 
        'sort_id' => 'required| unique:whyuses,sort_id', 
        'status' => 'required', 
       
      ];
      protected $messages = [
          'category.required' => 'Page Section Required.',
          'title.required' => 'Title Required.',
          'sub_title.required' => 'Sub Title Required.',
          'title_guj.required' => 'Title Required.',
          'sub_title_guj.required' => 'Sub Title Required.',
          // 'image.required' => 'Image Required.',
          'desc.required' => 'Description Required.',
          'desc_guj.required' => 'Description Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];


    
    public function addWhyus(){
      if($this->multi_images){
       $this->validate([
          'multi_images.*' => 'required', 

        ]);
      }
      $validatedData = $this->validate();

     if(!is_null($this->image)){
      $image =  $this->image;
 
      // Define folder path
      $folder = '/uploads/whyus';
      $uploadedData = $this->uploadOne($image, $folder);
      // dd( $uploadedData );
    }   



      $whyus = new Whyus();
      $whyus->category = $this->category;
      $whyus->title = $this->title;
      $whyus->sub_title = $this->sub_title;
      $whyus->slug =  $this->createSlug($this->title ?? NULL);
      $whyus->title_guj = $this->title_guj;
      $whyus->sub_title_guj = $this->sub_title_guj;
      $whyus->slug_guj =  strtolower(str_replace(' ', '-',$this->title_guj));
      $whyus->image = $uploadedData['file_name'] ?? NULL;
      $whyus->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $whyus->description = $this->desc;
      $whyus->description_guj = trim(str_replace('<pre>', '<p>', $this->desc_guj)) ?? Null;
      $whyus->yearexcellence = $this->yearexcellence;
      $whyus->expteachers = $this->expteachers;
      $whyus->notalumna = $this->notalumna;
      $whyus->link = $this->link;
      $whyus->sort_id =$this->sort_id;
      $whyus->status = $this->status;
      $whyus->save();


      if(!is_null($this->multi_images ) && $this->multi_images > 1){

          $folder = '/uploads/multiple_images';
        foreach ($this->multi_images as $img) {
          // Define folder path
          $uploadedData = $this->uploadOne($img, $folder);
          $whyusItem = new MultipleImages();
          $whyusItem->whyus_id = $whyus->id;
          $whyusItem->multi_images =  $uploadedData['file_name']?? NULL;
          $whyusItem->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
          $whyusItem->link = $this->link;;
          $whyusItem->status = $this->status;
          $whyusItem->ip_address = getUserIp();
          $whyusItem->login = authUserId();
          $whyusItem->save();
 
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
    $this->category = '';
    $this->title = '';
    $this->sub_title = '';
    $this->image = null;
    $this->desc = '';
    $this->link = '';
    $this->sort_id = '';
    $this->status = '';
    $this->item ='';
    $this->multi_images =null;

    
}
      //CREATE SLUG
    public function createSlug($title, $id = 0)
       {
        $slug =  Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
      }


      //INCREMENT SLUG
      protected function getRelatedSlugs($slug, $id = 0)
      {
          return Whyus::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }



     public function delete($id){

      $whyus = Whyus::findOrFail($id);
      if(!is_null($whyus)){
        $whyus->status = 'Inactive';
        $whyus->save();
      }

     }

    public function render()
    {
        $this->records = Whyus::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.whyus.whyus-page')->layout('layouts.backend');
    }
}
