<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use App\Models\PageContent;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\Models\Metadetails;
use Illuminate\Support\Facades\Route;
// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Livewire\WithPagination;
class ContactUs extends Component
{

   public $name;
   public $email;
   public $phone;
   public $message;
   public $terms_condition;

   public function mount(){
     /*meta tags*/ 	
    $getRouteName =  Route::currentRouteName(); 
    if($getRouteName){
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    SEOTools::setTitle($seoMetaData->title ?? 'Contact Us');
    if($seoMetaData){
    SEOTools::setDescription($seoMetaData->description ?? '');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? '');
    $keywords = $seoMetaData->keywords ?? '';
    SEOMeta::addKeyword( $keywords);
     }
    } /*meta tags*/ 
    
    }

public function send()
    {
    
    $validatedData =    $this->validate([
    'name' => 'required',
    'email' => 'required|email',
    'phone' => 'required',
    'message' => 'required',
    'terms_condition' => 'required',

    ]);
        
        //insert code here

// Send email only when validation and database entry are successful
if (empty($this->getErrorBag()->messages())) {
        // Send email
        Mail::to('jassi@yopmail.com')->send(new ContactUsMail([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,

        ]));
    }


    session()->flash('success', 'Your message has been sent successfully.');
    $this->resetForm();
    return redirect()->route('home.homepage');
    }  

   private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }  

    public function render()
    {
        return view('livewire.frontend.contact-us')->layout('layouts.frontend');
    }
}


