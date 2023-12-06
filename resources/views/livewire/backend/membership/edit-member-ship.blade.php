<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Membership</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Membership</li>
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
                            <h4 class="card-title">Add Membership</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                           
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name (Eng)</label>
                                        <input type="text" class="form-control" id="" wire:model="name" placeholder="">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name (Guj)</label>
                                        <input type="text" class="form-control" id="" wire:model="name_guj" placeholder="">
                                        @error('name_guj') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="" wire:model="editimage">

                                        @if(isset($editimage))  
                                               <img  src="{{$editimage->temporaryUrl()}}" width="200" alt="---"  width="100" height="70">  
                                        @else
                                         @php                                     
                                             $thumb = !empty($thumbnail) ?  getThumbnail($thumbnail)    : url('admin_assets/images/no-img.jpg');
                                        @endphp                                      
                                            <img src="{{$thumb}}" alt="" class="border" width="100" height="70">
                                        @endif
                                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3" >
                                        <label class="form-label">Status</label>
                                        <select wire:model="status" class="form-select">
                                             <option value="">Select</option>
                                             <option value="Active">Active</option>
                                             <option value="Inactive">Inactive </option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                               <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" class="form-control" id="" wire:model="hlink" placeholder="">
                                        @error('hlink') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
 
                              

                                <div >
                                    <button type="submit" wire:loading.attr="disabled" wire:click="editMembership" class="btn btn-primary w-md">Submit</button>
                                </div>
                                <div wire:loading wire:target="editMembership">
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
