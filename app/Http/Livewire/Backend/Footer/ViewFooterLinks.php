<?php

namespace App\Http\Livewire\Backend\Footer;

use Livewire\Component;
use App\Models\FooterLink;
use Illuminate\Support\Facades\Auth;
class ViewFooterLinks extends Component
{
	public $category,$pname,$pagetitle,$sort_id,$status;

	 protected $rules = [
        'category' => 'required',
        'pname' => 'required', 
        'pagetitle' => 'required', 
        'sort_id' => 'required| unique:footer_links,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'category.required' => 'Category Required.',
          'pname.required' => 'Page Name Required.',
          'pagetitle.required' => 'Page Title Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->category = '';
        $this->pname = '';
        $this->pagetitle = '';
        $this->sort_id = '';
        $this->status = '';
    }

   public function addLink()
    {

      $validatedData = $this->validate();

      $footerLink = new FooterLink();
      $footerLink->category = $this->category;
      $footerLink->pname = $this->pname;
      $footerLink->pagetitle = $this->pagetitle;
      $footerLink->sort_id =$this->sort_id;
      $footerLink->status = $this->status;
      $footerLink->login =  Auth::user()->id;
      $footerLink->ip_address =  Null;
      $footerLink->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $footerLink = FooterLink::findOrFail($id);
      if(!is_null($footerLink)){
        $footerLink->status = 'Inactive';
        $footerLink->save();
      }

     }


    public function render()
    {
    	$this->records = FooterLink::orderBy('sort_id','asc')->get();		
        return view('livewire.backend.footer.view-footer-links')->layout('layouts.backend');
    }
}
