<?php

namespace App\Http\Livewire\Backend\News;

use Livewire\Component;
use App\Models\LatestNews;
use Illuminate\Support\Str;

class EditLatestNews extends Component
{

   public  $newsId,$newsDate,$title,$desc,$title_guj,$desc_guj,$link,$sort_id,$status;

    protected $listeners = ["selectDate" => 'getDate'];

    public function getDate( $date ) {
        
        $this->newsDate = $date;
    }

    public function mount($id)
     {
        $latestNews = LatestNews::find($id);
        $this->newsId = $latestNews->id;
        $this->desc = $latestNews->description;
        $this->desc_guj = $latestNews->description_guj;
        $this->link = $latestNews->link;
        $this->sort_id = $latestNews->sort_id;
      	$this->status = $latestNews->status;
      
     }

    public function editLatestNews(){
      $date=date('Y-m-d', strtotime($this->newsDate));

      $latestNews = LatestNews::find($this->newsId);
      $latestNews->description = $this->desc;
      $latestNews->description_guj = $this->desc_guj;
      $latestNews->link = $this->link;
      $latestNews->sort_id =$this->sort_id;
      $latestNews->status = $this->status;
      $latestNews->save();

      return redirect()->route('view_news'); 
    } 

    public function render()
    {
        return view('livewire.backend.news.edit-latest-news')->layout('layouts.backend');
    }
}
