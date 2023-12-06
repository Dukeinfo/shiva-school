<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\PageContent;
use App\Models\Categories;
use App\Models\Gallery;
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
class GalleryDetail extends Component
{

	public $category_id,$category_name;
    public $seo_keywords;

    public function mount($category_id )
    {
     $category = Categories::findOrFail($category_id);
        $this->category_id = $category->id;
        $this->category_name = $category->name;
        $this->category_name_guj = $category->name_guj;

     //use for date
     $this->gallery = Gallery::where(['category_id'=> $category_id , 'status' => 'Active' ])->first();
          
     //use for images
     $this->records = Gallery::where(['category_id'=> $category_id , 'status' => 'Active' ])->get();
    /*meta tags*/ 
    $getRouteName =  Route::currentRouteName(); 
    if($getRouteName){
        $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
          if($seoMetaData){
            SEOTools::setTitle($seoMetaData->title ?? 'Gallery Detail');
            SEOTools::setDescription($seoMetaData->description ?? '');
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::setCanonical(url()->current());
            SEOTools::opengraph()->addProperty('type', 'website');
            SEOTools::twitter()->setSite($seoMetaData->title ?? '');
            $keywords = $seoMetaData->keywords ?? '';
            SEOMeta::addKeyword( $keywords);
            
     }
     $this->pageData =  PageContent::where('status','Active')->where('name',$getRouteName )->get();   
    } /*meta tags*/ 

    }

    public function render()
    {
        return view('livewire.frontend.gallery-detail')->layout('layouts.frontend');
    }
}
