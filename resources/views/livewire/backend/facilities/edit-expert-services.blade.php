<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Facilities Other</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Facilities Other</li>
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
                            <h4 class="card-title">Facilities Other</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">

<h4 class="card-title">Facilities Other</h4>

   <div class="col-md-3">
        <div class="mb-3">
            <label class="form-label"> Title</label>
            <input type="text" class="form-control" id="" wire:model="title" placeholder="Title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
<div class="col-md-12">
<div class="mb-12">
<label class="form-label">Value </label>
 <input type="text" class="form-control" id="" wire:model="howmany" placeholder="Value">
@error('howmany') <span class="error">{{ $message }}</span> @enderror
</div>
</div>
<div class="col-md-4">
<div class="mb-4">
<label class="form-label">Link</label>
<input type="text" class="form-control" id="" wire:model="link" placeholder="Link">
@error('link') <span class="error">{{ $message }}</span> @enderror
</div>
</div>
<hr>

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
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="saveRecord">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="saveRecord">
                                <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        
            
        </div>
        <!-- container-fluid <-->   
    </div>
</div>
