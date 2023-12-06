<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class ManageGallery extends Component
{
	use WithFileUploads;
  use UploadTrait;
    public $category_id,$name,$multi_images =[],$sort,$status ,$records ,$categories ;
    public $search,$year ,$title ,$lastUniqueSortingOrder;
 
    protected $queryString = ['search'];
    public function render()
    {
      $this->lastUniqueSortingOrder = Gallery::distinct()->orderBy('sort_id', 'desc')->value('sort_id');

      $years = [];
      $currentYear = date('Y');
      $endYear = $currentYear - 20;

      for ($year = $currentYear; $year >= $endYear; $year--) {
          $years[$year] = $year;
      }

       $this->categories = Categories::orderBy('sort_id','asc')->get();
        $this->records = Gallery::orderBy('sort_id','asc')->get();

        return view('livewire.backend.gallery.manage-gallery', compact('years','currentYear'))->layout('layouts.backend');
    }

        protected $rules = [
        'category_id' => 'required', 
        'year' => 'required',
        'sort' => 'required| unique:galleries,sort_id', 
        'status' => 'required', 
       
     
      ];
      protected $messages = [
          'category_id.required' => 'Category Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->category_id = '';
        $this->title = '';
        $this->year = '';
        $this->sort = '';
        $this->status = '';
    }


   public function addGallery(){

     if($this->multi_images){
       $this->validate([
          'multi_images.*' => 'required', 

        ]);
      }

     $validatedData = $this->validate();
    

      $gallery = new Gallery();
      $gallery->category_id = $this->category_id;
      $gallery->title = $this->title;
      $gallery->year = $this->year;
      $gallery->slug =  $this->createSlug($this->title ?? NULL);
      $gallery->sort_id =$this->sort;
      $gallery->status = $this->status;
      $gallery->save();

      if(!is_null($this->multi_images ) && $this->multi_images > 1){
         $folder = '/uploads/multiple_images';
         foreach ($this->multi_images as $img) {
          // Define folder path
          $uploadedData = $this->uploadOne($img, $folder);
          $galleryImages = new GalleryImage();
          $galleryImages->gallery_id = $gallery->id;
          $galleryImages->image =  $uploadedData['file_name']?? NULL;
          $galleryImages->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
          $galleryImages->save();
 
       }
      }

       $this->resetInputFields();

       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    


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
          return Gallery::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }



     public function delete($id){

      $gallery = Gallery::findOrFail($id);
      if(!is_null($gallery)){
        $gallery->status = 'Inactive';
        $gallery->save();
      }

     }

}
