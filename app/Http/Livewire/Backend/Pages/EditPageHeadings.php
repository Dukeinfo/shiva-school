<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\PageHeading;
use Illuminate\Support\Facades\Auth;
class EditPageHeadings extends Component
{
 
    public $editId,$menu_id,$pname,$pname_eng,$pname_title,$pname_heading,$pname_subheading,$sort_id,$status;



    public function mount($id)
     {
        $pageHeading = PageHeading::findOrFail($id);
        $this->editId = $pageHeading->id;
        $this->menu_id = $pageHeading->menu_id;
        $this->pname = $pageHeading->pname;
        $this->pname_eng = $pageHeading->pname_eng;
        $this->pname_title = $pageHeading->pname_title;
        $this->pname_heading = $pageHeading->pname_heading;
        $this->pname_subheading = $pageHeading->pname_subheading;
    	$this->sort_id = $pageHeading->sort_id;
    	$this->status = $pageHeading->status;
     }

   public function addPageHeading()
    {

      $pageHeading =PageHeading::find($this->editId);;
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

      return redirect()->route('page_headings');

       
    }   

    public function render()
    {
    	$this->getMenus = Menu::get();
        return view('livewire.backend.pages.edit-page-headings')->layout('layouts.backend');

    }
}
