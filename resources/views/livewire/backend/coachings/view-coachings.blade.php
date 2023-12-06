<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">LIFE AT SNKKV</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">LIFE AT SNKKV</li>
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
                            <h4 class="card-title">LIFE AT SNKKV</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">


                            	<div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label">Image (width:700 height:900)</label>
                                        <input type="file" class="form-control" id="" wire:model="image">
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>


    <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label"> Title (Eng)</label>
            <input type="text" class="form-control" id="" wire:model="title" placeholder="Title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3" >
            <label class="form-label">Description (Eng)</label>
          
     <div wire:ignore>
             <textarea  wire:model="desc" placeholder="Description of Event" class="form-control xtra-cat" rows="10"></textarea>
     </div>
    
     @error('desc') <span class="error">{{ $message }}</span> @enderror
         
        </div>
    </div>

   <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label"> Title (Guj)</label>
            <input type="text" class="form-control" id="" wire:model="title_guj" placeholder="Title">
            @error('title_guj') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3" >
            <label class="form-label">Description (Guj)</label>
          
     <div wire:ignore>
             <textarea wire:model="desc_guj" placeholder="Description of Event" rows="10" class="form-control xtra-cat"></textarea>
     </div>
     
     @error('desc_guj') <span class="error">{{ $message }}</span> @enderror
         
        </div>
    </div>
                                 <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" id="" wire:model="link"  placeholder="Link">
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
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="addCoachings">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="addCoachings">
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
                            <h4 class="card-title">Manage LIFE AT SNKKV</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th> Image</th>
                                            <th> Title (Eng)</th>
                                            <th> Description (Eng)</th>
                                            <th> Title (Guj)</th>
                                            <th> Description (Guj)</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(isset($records) && count($records)>0 )                      
                                         @foreach ($records as  $record)	
                                        <tr>
                                            <td>@php 
                                                $thumb = !empty($record->image) ? getThumbnail($record->thumbnail)  : url('admin_assets/images/no-img.jpg');
                                                @endphp                
                                            <img src="{{$thumb}}" alt="" class="border" width="100" height="70"></td>
                                           

                                            <td>{!!$record->title ?str_limit($record->title, $limit=100 ) : '' !!}</td>

                                           <td>{!!$record->description ?str_limit($record->description, $limit=100 ) : '' !!}</td>

                                               <td>{!!$record->title_guj ?str_limit($record->title_guj, $limit=100 ) : '' !!}</td>

                                           <td>{!!$record->description_guj ?str_limit($record->description_guj, $limit=100 ) : '' !!}</td>

                                        
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}</span></td>
                                            <td>
                                            	
                                                <a href="{{route('edit_coachings',['id' => $record->id])}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
        <!-- container-fluid <-->	</-->
    </div>
</div>
