<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Footer Links</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Add Footer Links</li>
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
                            <h4 class="card-title">Add Footer Links</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">

<div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label"> Category <span class="text-danger">*</span> </label>
                                        <select  wire:model="category" class="form-control">
                                         <option  value="">Select</option>
                                        <option value="Quick Links"> Quick Links
                                        </option>
                                        <option value="More Links"> More Links
                                      </option>    
                                        </select>
                                        @error('category') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

<div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label"> Link <span class="text-danger">*</span> </label>
                                        <select name="selected_route" wire:model="pname"  id="selected_route"   class="form-control">
                                         <option  value="">Select page (NULL)</option>
                                          
                                            @foreach(Route::getRoutes() as $route)
                                            @if (str_starts_with($route->getName(), 'home.') )
                                            @php
                                             $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                            @endphp
     <option value="{{ $route->getName() }}" 
        @if(in_array($route->getName(), [ 
            'detail_page',
            'gallery_detail',
        ])) disabled @endif
          class="form-control">{{ str_replace('_' , ' ',$routeName)}}</option>
                                           @endif
                                                @endforeach
                                        </select>
                                        @error('pname') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>




                               
                                

         <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label"> Link Title ( <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="" wire:model="pagetitle" placeholder="Link Title">
                                        @error('pagetitle') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                                
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order# <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="" wire:model="sort_id" placeholder="Sorting Order" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select wire:model="status" class="form-select">
                                             <option value="">Select</option>
                                             <option value="Active">Active</option>
                                             <option value="Inactive">Inactive </option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                        

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="addLink">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="addLink">
                                <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                             </div>
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
