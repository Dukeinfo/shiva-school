<div>

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Menu</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Portfolio</li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom py-3">
                <h4 class="card-title">Add Menu</h4>
                <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
            </div>
            <div class="card-body">
                <!--success or error alert-->
                
                
                <!--form starts-->
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label"> Page Name</label>
                            <input type="text" class="form-control" id="" wire:model="name" placeholder="Name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

            
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label"> Route Name</label>
                            <select name="selected_route" wire:model="link" id="selected_route"  class="form-control">
                             <option value="" >Select page</option>
                           
                                @foreach(Route::getRoutes() as $route)
                                     @if (str_starts_with($route->getName(), 'home.') )
                                    @php
                                        $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                     @endphp
<option value="{{ $route->getName() }}" 
@if(in_array($route->getName(), [ 
'home.gallery',
'home.gallery_detail',
])) disabled @endif
class="form-control">{{ str_replace('_' , ' ',$routeName)}}</option>

                                    @endif
                                @endforeach
                            </select>
                            @error('link') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

  

               
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Sorting Order#</label>
                            <input type="number" class="form-control" id="" wire:model="sort" placeholder="Sorting Order" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                            @error('sort') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select wire:model="status" class="form-select">
                            	 <option value="">Select</option>
                                 <option value="Active">Active</option>
                                 <option value="Inactive">Inactive </option>
                            </select>
                            @error('status') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
            

                   <div>
                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="addMenu">Submit</button>
                   
                </div>
                <div wire:loading wire:target="addMenu">
                    <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom py-3">
                <h4 class="card-title">Manage Menus</h4>
                <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                <div class="col-md-3 float-end">
                    <div class="form-group">

                        <div class="mb-3">
                            <label class="form-label">Search</label>
                            <input type="Search" class="form-control"  wire:model="search" placeholder="Search...">
                             @error('Search') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable--">
                        <thead>
                            <tr>
                                <th> Name</th>
                               
                                <th> Route Name</th>
                                <th>Sorting Order#</th>
                                <th>Status</th>
                    
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(isset($records) && count($records)>0 )                      
                             @foreach ($records as  $record)	
                            <tr>
                                <td>{{$record->name ?? '' }}</td>
                               
                                <td>{{$record->link ?? '' }}</td>
                                <td>{{$record->sort_id ?? '' }}</td>

                                <td>
                                    @if($record->status  == "Active")
                                    <a href="#" wire:click="inactive({{$record->id}})">
                                        <span class="badge badge-soft-success" > {{$record->status ?? '' }}</span>
                                    </a> 
                                    @else
                                   <a href="#" wire:click="active({{$record->id}})">
                                   <span class="badge badge-soft-danger" >  {{$record->status ?? '' }} </span>
                            </a> 
                                </td>
                               
                            </td>

                               @endif
                                    <td>
                                    <a href="{{url('/admin/edit/menu')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                    <a href="javascript:void(0)" class="text-danger me-2" title="Delete" wire:click="delete({{ $record->id }})"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                </td>
                            </tr>
                            @endforeach
                          @else
                     <tr>
                     <td colspan="4"> Record Not Found</td>
                    
                     </tr>
                     @endif 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->



</div>
<!-- container-fluid -->
</div>
</div>



