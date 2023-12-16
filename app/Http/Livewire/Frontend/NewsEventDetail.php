<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\PageContent;
use App\Models\BoardMembers;
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
class NewsEventDetail extends Component
{
    public $news_id;
    public $seo_keywords;
    public function mount($news_id)
    {

    //news detail
     $this->record = BoardMembers::where(['id'=> $news_id , 'status' => 'Active' ])->first();

     /*meta tags*/    
    $getRouteName =  Route::currentRouteName(); 
    if($getRouteName){
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    SEOTools::setTitle($seoMetaData->title ?? 'News Event Detail');
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
        return view('livewire.frontend.news-event-detail')->layout('layouts.frontend');
    }
}
