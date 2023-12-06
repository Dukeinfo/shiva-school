<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Gallery</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Manage Gallery</li>
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
                            <h4 class="card-title">Add Gallery</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                             <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name </label>
                                        <select class="form-select"   wire:model="category_id">
                                            <option value=""> Select menu</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                              <option value="{{$category->id}}"> {{$category->name}}</option>
                                            @endforeach
                                        @endif    
                                            </select>
                                        @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                                   

                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">Title name </label>
                                        <input type="text" class="form-control"  wire:model="title" placeholder="Image Title">
                                         @error('title') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                @php
                                            $years = [];
                                            $currentYear = date('Y');
                                            $endYear = $currentYear - 20;

                                        for ($year = $currentYear; $year >= $endYear; $year--) {
                                            $years[$year] = $year;
                                                }
                                @endphp
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Select Year</label>
                                        <select name="year"  wire:model="year" id="year" class="form-control">
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}" >{{ $year }}</option>
                                            @endforeach
                                        </select>
                                         @error('year') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                              

                                
                                
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Choose Multiple Image</label>
                                        <input type="file" class="form-control" wire:model="edit_multi_images" multiple>

                                         @error('edit_multi_images.*') <span class="error">{{ $message }}</span> @enderror

@foreach($getMultiple as $image)
<div style="display:inline-block">
<img src="{{getmultiple_images($image->image)}}" alt="" width="100" height="70">

<button class="btn btn-delete" wire:click='deletemultiple({{$image->id}})'>
  <span class="mdi mdi-delete mdi-24px"></span>
  <span>Delete</span>
</button>
                               </div>
                                 @endforeach                                         
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editGallery" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editGallery">
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
