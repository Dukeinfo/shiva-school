<?php

namespace App\Http\Livewire\Backend\Footer;

use App\Models\ContactInfo;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactusView extends Component
{
    use WithFileUploads;

    public $contactId;
    public $email;
    public $phone;
    public $address;
    public $logo;
    public $disclaimer;
    public $link;
    public $map;
    public function mount($contactId = null)
    {
        $this->contactId = $contactId;
        if ($this->contactId) {
            $contact = ContactInfo::findOrFail($this->contactId);
            $this->email = $contact->email;
            $this->phone = $contact->phone;
            $this->address = $contact->address;
            $this->disclaimer = $contact->disclaimer;
            $this->link = $contact->link;
            $this->map = $contact->map;
        }
    }
    public function render()
    {
        $contacts = ContactInfo::all();
        return view('livewire.backend.footer.contactus-view',compact('contacts'))->layout('layouts.backend');
    }
    public function store()
    {
    
        // Validate the input data
        $validatedData = $this->validate([
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'disclaimer' => 'nullable|string',
            'map' => 'nullable|string',
        ]);

        // Handle the logo file upload (if provided)
      
   
       
        if ($this->contactId) {
            $contact = ContactInfo::findOrFail($this->contactId);
        } else {
            $contact = new ContactInfo();
        }
        // Create a new ContactInformation instance and save it to the database
        if (isset($this->logo)) {
            $logoPath = $this->logo->store('logos', 'public');
            $contact->logo = $logoPath;
             $contact->save();

        }
    

        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->address = $this->address;
        $contact->disclaimer = $this->disclaimer;
        $contact->link = $this->link;
        $contact->map = $this->map;
        $contact->save();

        // Emit an event to notify the parent component (if needed)
        $this->emit('contactStored');

        // Reset the form fields after successful data storage
        $this->resetFields();

        // Redirect back or wherever you want after successful data storage
         $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    }

    private function resetFields()
    {
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->logo = null;
        $this->disclaimer = '';
        $this->link = '';
        $this->map = '';
    }
    public function edit($id)
    {
        $this->mount($id);
    }

    public function delete($id)
    {
        $contact = ContactInfo::findOrFail($id);
        $contact->status = 'Inactive';
        $contact->save();
        session()->flash('success', 'Contact information deleted successfully!');
    }
}
