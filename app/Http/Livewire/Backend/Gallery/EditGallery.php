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

class EditGallery extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public $galleryId,$category_id, $name, $edit_multi_images = [],$sort,$status ,$thumbnail;
    public  $categories,$title, $year;
     public function mount($id){
        $gallery = Gallery::findOrFail($id);
        $this->galleryId = $gallery->id;
        $this->category_id = $gallery->category_id;
        $this->title = $gallery->title;
        $this->year = $gallery->year;
        $this->sort = $gallery->sort_id;
    	$this->status = $gallery->status;
     }


     public function editGallery(){
     
        $gallery = Gallery::find($this->galleryId);
        $gallery->category_id =$this->category_id ?? NULL;
        $gallery->title = $this->title;
        $gallery->year = $this->year;
        $gallery->sort_id =$this->sort;
        $gallery->status = $this->status;
        $gallery->save();

        if(!is_null($this->edit_multi_images ) && $this->edit_multi_images > 1){

        $folder = '/uploads/multiple_images';
       foreach ($this->edit_multi_images as $img) {
        // Define folder path
        $uploadedData = $this->uploadOne($img, $folder);
          $galleryImages = new GalleryImage();
          $galleryImages->gallery_id = $gallery->id;
          $galleryImages->image =  $uploadedData['file_name']?? NULL;
          $galleryImages->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
          $galleryImages->save();

     }
    }
        
        return redirect()->route('manage_gallery'); 
        
     }

     private function resetInputFields(){
        $this->category_id = '';
        $this->image = '';
        $this->title = '';
        $this->year = '';
        $this->sort = '';
        $this->status = '';
    }
    
    public function deletemultiple($id){
        $image = GalleryImage::where('id',$id)->delete();
     }

    public function render()
    {
        $this->categories = Categories::get();
        $this->getMultiple =    GalleryImage::where('gallery_id' ,  $this->galleryId)->get();
                //when you delete image , you see latest pending images in real time
        return view('livewire.backend.gallery.edit-gallery')->layout('layouts.backend');
    }
}
