<?php

namespace App\Http\Livewire\Backend\Department;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Http\Request;

class ViewDepartment extends Component
{

    public $name,$name_guj,$desc,$sort,$status ,$records;

    public function render()
    {
    	$this->records = Department::orderBy('sort_id','asc')->get();
        return view('livewire.backend.department.view-department')->layout('layouts.backend');
    }

    protected $rules = [
        'name' => 'required', 
        'name_guj' => 'required', 
        'sort' => 'required| unique:departments,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'name_guj.required' => 'Name Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->name_guj = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addDepartment()
    {
      $validatedData = $this->validate();

      $department = new Department();
      $department->name = $this->name;
      $department->name_guj = $this->name_guj;
      $department->sort_id =$this->sort;
      $department->status = $this->status;
      $department->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $department = Department::findOrFail($id);
      if(!is_null($department)){
        $department->status = 'Inactive';
        $department->save();
      }

     }


}
