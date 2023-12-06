<?php

namespace App\Http\Livewire\Backend\Widget;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Widget;
use Illuminate\Support\Facades\Auth;
class ViewWidget extends Component
{

    public $pname,$menu_id,$spname,$pagetitle,$sort_id,$status;

    protected $rules = [
    	'menu_id' => 'required',
        'pname' => 'required', 
        'spname' => 'required', 
        'pagetitle' => 'required',  
        'sort_id' => 'required| unique:widgets,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
      	  'menu_id.required' => ',Menu Required.',
          'pname.required' => 'Page Name Required.',
          'spname.required' => 'Page Name Required.',
          'pagetitle.required' => 'Page Title Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
    	$this->menu = '';
        $this->pname = '';
        $this->spname = '';
        $this->pagetitle = '';
        $this->sort_id = '';
        $this->status = '';
    }


     public function addWidget()
    {

      $validatedData = $this->validate();

      $widget = new Widget();
      $widget->menu_id = $this->menu_id;
      $widget->pname = $this->pname;
      $widget->spname = $this->spname;
      $widget->pagetitle = $this->pagetitle;
      $widget->sort_id =$this->sort_id;
      $widget->status = $this->status;
      $widget->login =  Auth::user()->id;
      $widget->ip_address =  Null;
      $widget->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $widget = Widget::findOrFail($id);
      if(!is_null($widget)){
        $widget->status = 'Inactive';
        $widget->save();
      }

     }

  

    public function render()
    {
     $this->getMenus = Menu::get();
     $this->records = Widget::orderBy('sort_id','asc')->get();		
        return view('livewire.backend.widget.view-widget')->layout('layouts.backend');
    }
}
