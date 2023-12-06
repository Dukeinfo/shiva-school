<?php

namespace App\Http\Livewire\Backend\Gallery;

use App\Exports\ExportTopper;
use App\Exports\ExportTopperSample;
use App\Imports\OurToppersImport;
use Livewire\Component;
use App\Models\ClassMaster;
use App\Models\SectionMaster;
use App\Models\OurTopper;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StaffImport ;
class ViewOurTopper extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public $file  ,$getClass   ,$getSection  ,$records;

    public $category,$name,$classname,$section,$name_guj,$classname_guj,$section_guj,$percentage,$link,$image,$sort_id,$status;
    public   $selectedFields = [ 'category',	'name',	'class',	'section'	,'name_guj',  'class_guj',  'section_guj' ,'percentage'	,'image'	,'thumbnail',	'link',	'sort_id',	'status']; 
    public  $customHeadings = [ 'Category',	'Name',	'Class',	'Section'	,'Name (Gujrati)', 'Class (Gujrati)',  'Section (Gujrati)' ,'Percentage'	,'Image'	,'Thumbnail',	'Link',	'Sort ID',	'Status']; 

   

    protected $rules = [
        'category' => 'required', 
        'name' => 'required', 
        'classname' => 'required',
        'section' => 'required',
        'name_guj' => 'required', 
        'classname_guj' => 'required',
        'section_guj' => 'required',
       /* 'percentage' => 'required',*/
        'image' => 'required', 
        'sort_id' => 'required| unique:our_toppers,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'classname.required' => 'Class Required.',
          'section.required' => 'Section Required.',
          'name_guj.required' => 'Name Required.',
          'classname_guj.required' => 'Class Required.',
          'section_guj.required' => 'Section Required.',
         /* 'percentage.required' => 'Percentage Required.',*/
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->classname = '';
        $this->section = '';
        $this->name_guj = '';
        $this->classname_guj = '';
        $this->section_guj = '';
        $this->percentage = '';
        $this->image = '';
        $this->sort_id = '';
        $this->status = '';
    }

    public function addOurTopper(){
     $validatedData = $this->validate();
      if(!is_null($this->image)){
        $image =  $this->image;
        // Define folder path
        $folder = '/uploads/our_topper';
        $uploadedData = $this->uploadOne($image, $folder);
      }

      $ourTopper = new OurTopper();
      $ourTopper->category = $this->category ?? NULL;
      $ourTopper->name = $this->name ?? NULL;
      $ourTopper->class = $this->classname ?? NULL;
      $ourTopper->section = $this->section ?? NULL;
      $ourTopper->name_guj = $this->name_guj ?? NULL;
      $ourTopper->class_guj = $this->classname_guj ?? NULL;
      $ourTopper->section_guj = $this->section_guj ?? NULL;
      $ourTopper->percentage = $this->percentage ?? NULL;
      $ourTopper->link = $this->link ?? NULL;
      $ourTopper->image =$uploadedData['file_name'] ?? NULL;
      $ourTopper->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $ourTopper->sort_id =$this->sort_id ?? NULL;
      $ourTopper->status = $this->status ?? NULL;
      $ourTopper->save();

      $this->resetInputFields(); 
      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }

     public function delete($id){

      $ourTopper = OurTopper::findOrFail($id);
      if(!is_null($ourTopper)){
        $ourTopper->delete();
      }

     }

    public function render()
    {
    	$this->getClass = ClassMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
    	 $this->getSection = SectionMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
    	 $this->records = OurTopper::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.gallery.view-our-topper')->layout('layouts.backend');
    }


    public function import_tooper(){
      $this->validate([
        'file' => 'required|mimes:xlsx,xls|max:2048',
    ]);

    try {
        Excel::import(new OurToppersImport, $this->file);
        session()->flash('success', 'Topper imported successfully!');
        $this->file = null;
    } catch (\Exception $e) {
        session()->flash('error', 'Error importing Topper students Please check your Excel file and try again.');
    }
    }

    


public function export_topper(){
  //  $data = Staff::all(); // Replace 'Example' with your model
  return Excel::download(new ExportTopper($this->selectedFields, $this->customHeadings), 'OurToppesr.xlsx');

}

public function sampleexport() {
      return Excel::download(new ExportTopperSample(), 'toppersample.xlsx');
  }



}
