<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Students in Headline</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Students in Headline</li>
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
                            <h4 class="card-title">Add  Students in Headline</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                               
                            
                                

                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">News (Eng)</label>
                                    
                                 <div wire:ignore>
                                         <textarea wire:model="desc" placeholder="Description of Event" class="form-control xtra-cat" ></textarea>
                                 </div>

                     
                                           @error('desc') <span class="error">{{ $message }}</span> @enderror                          
                                  </div>
                                </div>

                                  

                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">News (Guj)</label>
                                    
                                 <div wire:ignore>
                                         <textarea  wire:model="desc_guj" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                                 </div>
                
                    
                                           @error('desc_guj') <span class="error">{{ $message }}</span> @enderror                          
                                  </div>
                                </div>
                                
                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Link</label>
                                        <input type="url" class="form-control" id="" wire:model="link" placeholder="http://example.com">
                                        @error('link') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                 

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"  wire:model="sort_id" placeholder="Order NUmber">
                                         @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" wire:model="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive </option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editLatestNews" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editLatestNews">
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
