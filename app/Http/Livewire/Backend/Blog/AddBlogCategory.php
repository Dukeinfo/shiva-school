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
class AddBlogCategory extends Component
{
 
    use WithFileUploads;
    use UploadTrait;
    public $name, $sort,$status;
    public $records,$thumbnail;
    protected $rules = [
        'name' => 'required| unique:blog_categories,name', 
        'sort' => 'required| unique:blog_categories,sort_id', 
        'status' => 'required', 
     
      ];
    protected $messages = [
          'name.required' => 'Name Required.',
          'name.unique' => 'This category name is already taken.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addCategory(){
      $validatedData = $this->validate();
      $categories = new BlogCategory();
      $categories->name = $this->name ?? NULL;
      $categories->sort_id =$this->sort ?? NULL;
      $categories->status = $this->status ?? NULL;
      $categories->save();

        $this->resetInputFields(); 
        $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    }  

    public function delete($id){

      $category = BlogCategory::findOrFail($id);
      if(!is_null($category)){
        $category->status = 'Inactive';
        $category->save();
      }

     }

    public function render()
    {
    	$this->records = BlogCategory::orderBy('sort_id','asc')->get();
    		
        return view('livewire.backend.blog.add-blog-category')->layout('layouts.backend');
    }
}
