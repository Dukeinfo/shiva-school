<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\PageHeading;
use Illuminate\Support\Facades\Auth;
class ViewPageHeadings extends Component
{

	public $menu_id,$pname,$pname_eng,$pname_title,$pname_heading,$pname_subheading,$pname_subsecheading,$pname_subsecheading_guj,$sort_id,$status;

    protected $rules = [
    	'menu_id' => 'required',
        'pname' => 'required', 
        'pname_eng' => 'required', 
        'pname_title' => 'required', 
        'pname_heading' => 'required', 
        'pname_subheading' => 'required', 
        'sort_id' => 'required| unique:page_headings,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
      	  'menu_id.required' => 'Menu Required.',
          'pname.required' => 'Page Name Required.',
          'pname_eng.required' => 'Page Name Required.',
          'pname_title.required' => 'Page Title Required.',
          'pname_heading.required' => 'Page Heading Required.',
          'pname_subheading.required' => 'Page Sub Heading Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
       	$this->menu = '';
        $this->pname = '';
        $this->pname_eng = '';
        $this->pname_title = '';
        $this->pname_heading = '';
        $this->pname_subheading = '';
        $this->sort_id = '';
        $this->status = '';   
    }

    public function addPageHeading()
    {

      $pageHeading = $this->validate();

      $pageHeading = new PageHeading();
      $pageHeading->menu_id = $this->menu_id;
      $pageHeading->pname = $this->pname;
      $pageHeading->pname_eng = $this->pname_eng;
      $pageHeading->pname_title = $this->pname_title;
      $pageHeading->pname_heading = $this->pname_heading;
      $pageHeading->pname_subheading = $this->pname_subheading;
      $pageHeading->sort_id =$this->sort_id;
      $pageHeading->status = $this->status;
      $pageHeading->login =  Auth::user()->id;
      $pageHeading->ip_address =  Null;
      $pageHeading->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 



     public function delete($id){
      $pageHeading = PageHeading::findOrFail($id);
      if(!is_null($pageHeading)){
      $pageHeading->status = 'Inactive';
      $pageHeading->save();
      }
     }


    public function render()
    {
     $this->getMenus = Menu::get();
     $this->records = PageHeading::orderBy('sort_id','asc')->get();
        return view('livewire.backend.pages.view-page-headings')->layout('layouts.backend');

    }
}
