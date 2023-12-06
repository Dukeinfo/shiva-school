<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Blogs;
use App\Models\BlogCategory;
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
class BlogDetail extends Component
{
    public $category_id,$category_name;
    public $seo_keywords;

	public function mount($category_id )
    {
     $category = BlogCategory::findOrFail($category_id);
     $this->category_id = $category->id;
     $this->category_name = $category->name;

     //blog detail
     $this->record = Blogs::where(['id'=> $category_id , 'status' => 'Active' ])->first();

    /*meta tags*/    
    $getRouteName =  Route::currentRouteName(); 
    if($getRouteName){
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    SEOTools::setTitle($seoMetaData->title ?? 'Blog Detail');
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
    public function render()
    {
        return view('livewire.frontend.blog-detail')->layout('layouts.frontend');
    }
}
