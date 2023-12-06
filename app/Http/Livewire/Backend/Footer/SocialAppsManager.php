<?php

namespace App\Http\Livewire\Backend\Footer;

use App\Models\SocialApp;
use Livewire\Component;
use Livewire\WithFileUploads;

class SocialAppsManager extends Component
{
    use WithFileUploads;
    public $category;
    public $link;
    public $selectedId;
    public $isEditing = false;

    protected $rules = [
        'category' => 'required| unique:social_apps,category',
        'link' => 'required|url',
    ];
    public function render()
    {
        $socialApps = SocialApp::all();
        return view('livewire.backend.footer.social-apps-manager',compact('socialApps'))->layout('layouts.backend');
        }

        public function create()
        {
            $this->resetValidation();
            $this->resetFields();
            $this->isEditing = false;
        }

        
    public function store()
    {
        $this->validate();

        SocialApp::create([
            'category' => $this->category,
            'link' => $this->link,
        ]);

        $this->resetFields();
        session()->flash('success', 'Social app created successfully!');
    }

    public function edit($id)
    {
        $socialApp = SocialApp::findOrFail($id);
        $this->selectedId = $socialApp->id;
        $this->category = $socialApp->category;
        $this->link = $socialApp->link;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $socialApp = SocialApp::findOrFail($this->selectedId);

        $socialApp->update([
            'category' => $this->category,
            'link' => $this->link,
        ]);

        $this->resetFields();
        $this->isEditing = false;
        session()->flash('success', 'Social app updated successfully!');
    }

    public function delete($id)
    {
        $socialApp = SocialApp::findOrFail($id);
        $socialApp->status = 'Inactive';
        $socialApp->save();
        session()->flash('success', 'Social app deleted successfully!');
    }

    private function resetFields()
    {
        $this->category = '';  
        $this->link = '';
    }
}
