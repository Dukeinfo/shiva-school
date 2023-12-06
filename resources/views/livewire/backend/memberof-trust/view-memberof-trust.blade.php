<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Members of Trust</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Members of Trust</li>
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
                            <h4 class="card-title">Members of Trust</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                <!--form starts-->
                <div class="row g-3">

                 <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                            <select wire:model="category" class="form-select">
                                                <option value="">Select Sections</option>
                                                <option value="1"> Members of Trust</option>
                                                <option value="2">Committee Members</option>
                                            </select>
                                        @error('category') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>

                                
                <div class="col-md-e">
                    <div class="mb-3">
                        <label class="form-label"> Name (Eng)</label>
                        <input type="text" class="form-control" id="" wire:model="name" placeholder="Name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-md-e">
                    <div class="mb-3">
                        <label class="form-label"> Designation (Eng)</label>
                        <input type="text" class="form-control" id="" wire:model="designation" placeholder="Designation">
                        @error('designation') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                 
                <div class="col-md-12">
                    <div class="mb-3" >
                        <label class="form-label">Description (Eng)</label>
                      
                 <div wire:ignore>
                         <textarea id="editor" wire:model="desc" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                 </div>
                 <script>
                            document.addEventListener('livewire:load', function () {
                                // Get the CSRF token from the meta tag
                                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                                CKEDITOR.replace('editor', {
                                    // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                                    filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                                    filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                                    filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                                    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                                    },
                                    
                                });
                    
                                CKEDITOR.instances.editor.on('change', function () {
                                    @this.set('desc', CKEDITOR.instances.editor.getData());
                                });
                                Livewire.on('formSubmitted', function () {
                                CKEDITOR.instances.editor.setData(''); // Reset CKEditor content

                                // document.querySelector('[wire:model="image"]').reset();

                                            });
                                    });
                            </script>
                 @error('desc') <span class="error">{{ $message }}</span> @enderror
                     
                    </div>
                </div>

                 <div class="col-md-e">
                    <div class="mb-3">
                        <label class="form-label"> Name (Guj)</label>
                        <input type="text" class="form-control" id="" wire:model="name_guj" placeholder="Name">
                        @error('name_guj') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>


             
                <div class="col-md-e">
                    <div class="mb-3">
                        <label class="form-label"> Designation (Guj)</label>
                        <input type="text" class="form-control" id="" wire:model="designation_guj" placeholder="Designation">
                        @error('designation_guj') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

 
            
                <div class="col-md-12">
                    <div class="mb-3" >
                        <label class="form-label">Description (Guj)</label>
                      
                 <div wire:ignore>
                         <textarea id="editor_guj" wire:model="desc_guj" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                 </div>
                 <script>
                            document.addEventListener('livewire:load', function () {
                                // Get the CSRF token from the meta tag
                                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                                CKEDITOR.replace('editor_guj', {
                                    // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                                    filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                                    filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                                    filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                                    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                                    },
                                    
                                });
                    
                                CKEDITOR.instances.editor_guj.on('change', function () {
                                    @this.set('desc_guj', CKEDITOR.instances.editor_guj.getData());
                                });
                                Livewire.on('formSubmitted', function () {
                                CKEDITOR.instances.editor_guj.setData(''); // Reset CKEditor content

                                // document.querySelector('[wire:model="image"]').reset();

                                            });
                                    });
                            </script>
                 @error('desc_guj') <span class="error">{{ $message }}</span> @enderror
                     
                    </div>
                </div>



                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label"> Image </label>
                                    <input type="file" class="form-control" id="" wire:model="image" >
                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label"> Link</label>
                                        <input type="url" class="form-control" id="" wire:model="link" value="https://example.com/" placeholder="http://example.com">
                                        @error('link') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                              
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort_id" placeholder="Sorting Order" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select wire:model="status" class="form-select">
                                             <option value="">Select</option>
                                             <option value="Active">Active</option>
                                            <option value="Inactive"> Inactive </option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="addMembers">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="addMembers">
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
                            <h4 class="card-title">Manage Members of Trust</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                        	<th> Category </th>
                                            <th> Name (Eng)</th>
                                            <th> Designation (Eng)</th>
                                            <th> Name (Guj)</th>
                                            <th> Designation (Guj)</th>
                                            <th>Image</th> 
                                            <th> Link</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(isset($records) && count($records)>0 )                      
                                         @foreach ($records as  $record)    
                                        <tr>
                                        <td>
                                         @if($record->category=="1")
                                         Members of Trust
                                         @else
                                         Committee Members
                                         @endif
                                        </td>  
                                        <td>{{$record->name ?? '' }}</td>  
                                        <td>{{$record->designation ?? '' }}</td>
                                        <td>{{$record->name_guj ?? '' }}</td>  
                                        <td>{{$record->designation_guj ?? '' }}</td>
            <td>
                                               @php
                                               
$thumb = !empty($record->image) ? getThumbnail($record->thumbnail) : url('admin_assets/images/no-img.jpg');
@endphp                                      
<img src="{{$thumb}}" alt="" class="border" width="100" height="70">
                                            </td>
                                        <td>{{$record->link ?? '' }}</td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}</span></td>
                                            <td>                               
                                                <a href="{{route('edit_memberof_trust',['id' => $record->id])}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
        <!-- container-fluid <-->   </-->
    </div>
</div>
