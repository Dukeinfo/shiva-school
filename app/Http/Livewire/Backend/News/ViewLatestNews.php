<?php

namespace App\Http\Livewire\Backend\News;

use Livewire\Component;
use App\Models\LatestNews;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ViewLatestNews extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public  $newsDate,$title,$desc,$title_guj,$desc_guj,$link,$sort_id,$status;

    protected $listeners = ["selectDate" => 'getDate'];

     protected $rules = [ 

        'desc' => 'required',
        'desc_guj' => 'required',
        'sort_id' => 'required| unique:latest_news,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'desc.required' => 'Description Required.',
          'desc_guj.required' => 'Description Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->newsDate = '';
        $this->desc = '';
        $this->desc_guj = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

  
    public function getDate( $date ) {
        
        $this->newsDate = $date;
    }


    public function addLatestNews(){

      $validatedData = $this->validate();

      $date=date('Y-m-d', strtotime($this->newsDate));

      
      $latestNews = new LatestNews();
      $latestNews->description = $this->desc;
      $latestNews->description_guj = $this->desc_guj;
      $latestNews->link = $this->link;
      $latestNews->sort_id =$this->sort_id;
      $latestNews->status = $this->status;
      $latestNews->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }

      public function delete($id){

      $latestNews = LatestNews::findOrFail($id);
      if(!is_null($latestNews)){
        $latestNews->status = 'Inactive';
        $latestNews->save();
      }

     }

    public function render()
    {
    	 $this->records = LatestNews::orderBy('sort_id','asc')->get();
        return view('livewire.backend.news.view-latest-news')->layout('layouts.backend');
    }
}
