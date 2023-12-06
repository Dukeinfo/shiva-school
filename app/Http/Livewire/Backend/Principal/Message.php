<?php

namespace App\Http\Livewire\Backend\Principal;

use Livewire\Component;
use App\Models\Message as appMessage;

class Message extends Component
{

	public $name,$heading,$desc,$name_guj,$heading_guj,$desc_guj,$sort,$status;

	protected $rules = [
        'name' => 'required', 
        'heading' => 'required', 
        'desc' => 'required',
        'name_guj' => 'required', 
        'heading_guj' => 'required', 
        'desc_guj' => 'required',
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'heading.required' => 'Heading Required.',
          'desc.required' => 'Message Required.',
          'name_guj.required' => 'Name Required.',
          'heading_guj.required' => 'Heading Required.',
          'desc_guj.required' => 'Message Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->heading = '';
        $this->desc = '';
        $this->name_guj = '';
        $this->heading_guj = '';
        $this->desc_guj = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addMessage()
    {

   
      $validatedData = $this->validate();

      $message = new appMessage();
      $message->name = $this->name;
      $message->heading = $this->heading;
      $message->message = $this->desc;
      $message->name_guj = $this->name_guj;
      $message->heading_guj = $this->heading_guj;
      $message->message_guj = $this->desc_guj;
      $message->sort_id =$this->sort;
      $message->status = $this->status;
      $message->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $message = appMessage::findOrFail($id);
      if(!is_null($message)){
        $message->delete();
      }

     }


    public function render()
    {
    	$this->records = appMessage::orderBy('sort_id','asc')->get();
        return view('livewire.backend.principal.message')->layout('layouts.backend');
    }
}
