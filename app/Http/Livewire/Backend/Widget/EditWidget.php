<?php

namespace App\Http\Livewire\Backend\Widget;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Widget;
use Illuminate\Support\Facades\Auth;
class EditWidget extends Component
{

    public $editId,$menu_id,$pname,$spname,$pagetitle,$sort_id,$status;

      public function mount($id)
     {
        $widget = Widget::findOrFail($id);
        $this->editId = $widget->id;
        $this->menu_id = $widget->menu_id;
        $this->pname = $widget->pname;
        $this->spname = $widget->spname;
        $this->pagetitle = $widget->pagetitle;
       	$this->sort_id = $widget->sort_id;
      	$this->status = $widget->status;
     }
 
    public function editWidget(){

      $widget = Widget::find($this->editId);
      $widget->menu_id = $this->menu_id;
      $widget->pname = $this->pname;
      $widget->spname = $this->spname;
      $widget->pagetitle = $this->pagetitle;
      $widget->sort_id =$this->sort_id;
      $widget->status = $this->status;
      $widget->login =  Auth::user()->id;
      $widget->ip_address =  Null;
      $widget->save();

      return redirect()->route('add_widget'); 

    }

    public function render()
    {
    	 $this->getMenus = Menu::get();
        return view('livewire.backend.widget.edit-widget')->layout('layouts.backend');
    }
}
