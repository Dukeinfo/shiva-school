<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;
use App\Models\BlogCategory;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class EditBlogCategory extends Component
{

    public $categoryId,$name,$sort,$status;

    public function mount($id){
        $catgory = BlogCategory::findOrFail($id);
        $this->categoryId = $catgory->id;
        $this->name = $catgory->name;
        $this->sort = $catgory->sort_id;
    	$this->status = $catgory->status;
     }

    public function editCategory(){
    	$category = BlogCategory::find($this->categoryId);
        $category->name = $this->name;
        $category->sort_id =$this->sort;
        $category->status = $this->status;
        $category->save();
        return redirect()->route('add_blog_category'); 
    }  

    public function render()
    {
        return view('livewire.backend.blog.edit-blog-category')->layout('layouts.backend');
    }
}
