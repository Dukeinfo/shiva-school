<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;
use App\Models\Blogs;
use App\Models\BlogCategory;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class EditBlog extends Component
{

	use WithFileUploads;
    use UploadTrait;

    public $category_id,$blogId,$blogdate,$title,$desc,$image,$editimage,$sort,$status;
    public $records ,$thumbnail;

     protected $listeners = ["selectDate" => 'getDate']; 

      public function getDate( $date ) {
        
        $this->blogdate = $date;
      }


     public function mount($id){
        $blog = Blogs::findOrFail($id);
        $this->blogId = $blog->id;
        $this->category_id = $blog->category_id;
        $this->blogdate = $blog->blogdate;
        $this->title = $blog->title;
        $this->desc = $blog->description;
        $this->image = $blog->image;
        $this->thumbnail = $blog->thumbnail;
        $this->sort = $blog->sort_id;
    	$this->status = $blog->status;
     }

     public function editBlog() {
     
       $date=date('Y-m-d', strtotime($this->blogdate));

        if(!is_null($this->editimage)){
    
            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/blogs';
            $uploadedData = $this->uploadOne($image, $folder);
        
            $blog = Blogs::find($this->blogId);
            $blog->category_id = $this->category_id;
            $blog->blogdate = $date;
            $blog->title = $this->title;
            $blog->description = $this->desc;
            $blog->slug =  $this->createSlug($this->title ?? NULL);
            $blog->image = $uploadedData['file_name'] ?? NULL;
            $blog->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
            $blog->sort_id =$this->sort;
            $blog->status = $this->status;
            $blog->save();
         
 
        }
        else{
            $blog = Blogs::find($this->blogId);
            $blog->category_id = $this->category_id;
            $blog->blogdate = $date;
            $blog->title = $this->title;
            $blog->description = $this->desc;
            $blog->slug =  $this->createSlug($this->title ?? NULL);
            $blog->sort_id =$this->sort;
            $blog->status = $this->status;
            $blog->save();
        }
        return redirect()->route('manage_blog'); 
        

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
          return Blogs::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }


    public function render()
    {
       $this->categories = BlogCategory::orderBy('sort_id','asc')->get();
        return view('livewire.backend.blog.edit-blog')->layout('layouts.backend');
    }
}
