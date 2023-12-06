<?php

namespace App\Http\Livewire\Backend\Principal;

use Livewire\Component;
use App\Models\Message;

class EditMessage extends Component
{

	public $messageId,$name,$heading,$desc,$name_guj,$heading_guj,$desc_guj,$sort,$status;

    public function mount($id)
     {
        $message = Message::findOrFail($id);
        $this->messageId = $message->id;
        $this->name = $message->name;
        $this->heading = $message->heading;
        $this->desc = $message->message;
         $this->name_guj = $message->name_guj;
        $this->heading_guj = $message->heading_guj;
        $this->desc_guj = $message->message_guj;
    	$this->sort = $message->sort_id;
    	$this->status = $message->status;
     }

   public function editMessage(){

   	  $message = Message::find($this->messageId);
      $message->name = $this->name;
      $message->heading = $this->heading;
      $message->message = $this->desc;
      $message->name_guj = $this->name_guj;
      $message->heading_guj = $this->heading_guj;
      $message->message_guj = $this->desc_guj;
      $message->sort_id =$this->sort;
      $message->status = $this->status;
      $message->save();

      return redirect()->route('create_message');
   

   }  

    public function render()
    {
        return view('livewire.backend.principal.edit-message')->layout('layouts.backend');
    }
}
