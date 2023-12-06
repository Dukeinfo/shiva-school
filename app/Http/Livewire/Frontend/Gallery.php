<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\PageContent;
use App\Models\Categories;
use App\Models\Gallery as ModelsGallery;
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
class Gallery extends Component
{

    public $total;
    public $perPage = 3;

    public function mount(){
     $this->total=Categories::orderBy('id', 'desc')->where('status', 'Active')->get();
    /*meta tags*/ 
    $getRouteName =  Route::currentRouteName(); 
    if($getRouteName){
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    SEOTools::setTitle($seoMetaData->title ?? 'Photo Gallery');
    if($seoMetaData){
    SEOTools::setDescription($seoMetaData->description ?? '');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? '');
    $keywords = $seoMetaData->keywords ?? '';
    SEOMeta::addKeyword( $keywords);
       }
    }/*meta tags*/ 
    }

     public function loadMore()
    {
        $this->perPage = $this->perPage + 3;
    }

    public function render()
    {
     $this->categories =Categories::where('status', 'Active')->orderBy('id', 'desc')->limit($this->perPage)->get();

        return view('livewire.frontend.gallery')->layout('layouts.frontend');
    }
}
