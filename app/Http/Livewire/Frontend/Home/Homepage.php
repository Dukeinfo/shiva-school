<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\Memberships;
use App\Models\BoardMembers;
use App\Models\Facilities;
use App\Models\Coachings;
use App\Models\KnowledgeHome;
use App\Models\Testimonials;
use Livewire\Component;
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
class Homepage extends Component
{

    public $sliders,$seo_keywords ;

    public function mount(){
        $getRouteName =  Route::currentRouteName(); 
        $seoMetaData =  Metadetails::where('name',$getRouteName )->first();   
        SEOTools::setTitle($seoMetaData->title ?? 'Home ');
        SEOTools::setDescription($seoMetaData->description ?? '');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite($seoMetaData->title ?? '');
        $keywords = $seoMetaData->keywords ?? '';
        SEOMeta::addKeyword( $keywords);
       
        $this->sliders = Slider::orderBy('sort_id','asc')->where('status','Active')->get();	
        }

    public function render()
    {
    return view('livewire.frontend.home.homepage')->layout('layouts.frontend');
    }
}
