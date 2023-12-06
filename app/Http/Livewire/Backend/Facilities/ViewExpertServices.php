<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\ExpertService;
class ViewExpertServices extends Component
{
    public $title,$howmany,$link,$sort,$status;

    protected $rules = [
        'title' => 'required',
        'howmany' => 'required',
        'sort' => 'required| unique:expert_services,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'title.required' => 'Title Required.',
          'howmany.required' => 'Value Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->title = '';
        $this->howmany = '';
        $this->link = '';
        $this->sort = '';
        $this->status = '';
    }

     public function saveRecord()
    {

      $validatedData = $this->validate();

      $facilities = new ExpertService();
      $facilities->title = $this->title;
      $facilities->howmany = $this->howmany;
      $facilities->link = $this->link;
      $facilities->sort_id =$this->sort;
      $facilities->status = $this->status;
      $facilities->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $facilities = ExpertService::findOrFail($id);
      if(!is_null($facilities)){
         $facilities->status = 'Inactive';
         $facilities->save();
      }

     }


    public function render()
    {
    	$this->records = ExpertService::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.facilities.view-expert-services')->layout('layouts.backend');
    }
}
