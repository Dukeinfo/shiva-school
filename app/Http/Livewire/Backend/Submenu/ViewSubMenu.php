<?php

namespace App\Http\Livewire\Backend\Submenu;

use App\Models\Menu;
use App\Models\Submenu;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class ViewSubMenu extends Component
{
  use UploadTrait;
  use WithFileUploads;
    public $image = null; 
    public $seo_description = null;
    public  $records, $getMenus,$menu_id ,$name,$name_guj,$sort_id, $cms , $pname ,$status ;
    public   $url_link,$display_title,$display_heading,$display_subheading ,$seo_title ,$clientIp  ,$seo_keywords; 
    public function render(Request $request)
    {
      $this->clientIp = $request->ip();

        $this->getMenus = Menu::get();
        $this->records=Submenu::orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.submenu.view-sub-menu')->layout('layouts.backend');
    }

    protected $rules = [ 
        'menu_id' => 'required', 
        'name' => 'required | unique:submenus,name',

        'sort_id' => 'required',
        'cms' => 'required', 
        'status' => 'required', 
        // 'image' =>  'required|file', 
     
      ];
      protected $messages = [
          'menu_id.required' => 'Menu Required.',
          'name.required' => 'Name Required.',
  
          'sort_id.required' => 'Sort Required.',
          'sort_id.unique' => 'Sort number already taken.',
     
          'cms.required' => 'CMS Required.',
          'status.required' => 'Status Required.',
          
      ];


    public function addsubMenu(){
      if($this->cms == "Yes"){
        $this->validate([
          'menu_id' => 'required', 
          'name' => 'required | unique:submenus,name',
         
          'sort_id' => 'required',
          'cms' => 'required', 
          'url_link' => 'required', 
          'status' => 'required', 
          'image' =>  'required|file', 
        ]);
      }
    $this->validate([
      'menu_id' => 'required', 
      'name' => 'required | unique:submenus,name',
     
      'sort_id' => 'required',
      'cms' => 'required', 
      'status' => 'required', 
      'pname'=> 'required', 
    ]);
      if(!is_null($this->image)){
        $image =  $this->image;
        // Define folder path
        $folder = '/uploads/submenu';
        $uploadedData = $this->uploadOne($image, $folder);

      }   
      $submenu = new Submenu([
        'menu_id' => $this->menu_id,
        'name' => $this->name,
        'sort_id' => $this->sort_id,
        'cms' => $this->cms ?? Null,
        'pname' => $this->pname?? Null,
        'status' => $this->status,
        'image' => $uploadedData['file_name'] ?? Null,
        'thumbnail' => $uploadedData['thumbnail_name'] ?? Null,
        'url_link' => $this->url_link ?? Null,
        'display_title' => $this->display_title ?? Null,  
        'display_heading' => $this->display_heading ?? Null,  
        'display_subheading' => $this->display_subheading ?? Null,
        'slug' =>  $this->createSlug($this->name ?? NULL),
        'seo_title' => $this->seo_title ?? Null,
        'seo_keywords' => $this->seo_keywords ?? Null,
        'seo_description' => $this->seo_description ?? Null,
        'login' => getUserIp() ?? Null,
        'ip_address' => $this->clientIp ?? Null,
    ]);
        // Save the new Submenu record to the database
        $submenu->save();

        // Reset the form fields
        $this->resetFormFields();

        // Emit the 'formSubmitted' event
        $this->emit('formSubmitted');

        // Trigger the SweetAlert modal
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Successfully saved!',
        ]);
      // Reset the image property to null
      $this->image = null;
        // return   redirect(request()->header('Referer'));
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
          return Submenu::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }


    private function resetFormFields()
    {
        $this->menu_id = null;
        $this->name = null;
        $this->sort_id = null;
        $this->cms = null;
        $this->pname = null;
        $this->status = null;
        $this->url_link = null;
        $this->display_title = null;
        $this->display_heading = null;
        $this->display_subheading = null;
        $this->seo_title = null;
        $this->seo_keywords = null;
        $this->seo_description = null;
    }
    public function delete($id){
         $smenu = Submenu::findOrFail($id);
          if(!is_null($smenu)){
           $smenu->status = 'Inactive';
           $smenu->save();
          }
     }
}
