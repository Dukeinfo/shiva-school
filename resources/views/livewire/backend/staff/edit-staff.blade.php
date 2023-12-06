<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Staff</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Staff</li>
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
                            <h4 class="card-title">Add Staff</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" wire:model="department_id" disabled>
                                                <option value="">Select</option>
                                                @if(isset($departments))
                                            @foreach($departments as $department)
                                              <option value="{{$department->id}}"> {{$department->name}}</option>
                                            @endforeach
                                        @endif 
                                        </select>
                                         @error('department_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name (Eng)</label>
                                        <input type="text" class="form-control" id="" wire:model="name" placeholder="Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Designation (Eng)</label>
                                        <input type="text" class="form-control" id="" wire:model="designation" placeholder="Designation">
                                        @error('designation') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                         <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name (Guj)</label>
                                        <input type="text" class="form-control" id="" wire:model="name_guj" placeholder="Name">
                                        @error('name_guj') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Designation (Guj)</label>
                                        <input type="text" class="form-control" id="" wire:model="designation_guj" placeholder="Designation">
                                        @error('designation_guj') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Image</label>
                                        <input type="file" class="form-control" wire:model="editimage">
                                        @if(isset($editimage))  
                                        <img  src="{{$editimage->temporaryUrl()}}" width="200" alt="---"  width="100" height="70">  
                                        @else                                        
                                        @php    
                                        $thumb = !empty($thumbnail) ? getThumbnail($thumbnail)  : url('admin_assets/images/no-img.jpg');
                                        @endphp                                      
                                        <img src="{{$thumb}}" alt="" class="border" width="100" height="70">
                                        @endif
                                         @error('editimage') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Description (Eng)</label>
                                            <div wire:ignore>
                                                <textarea id="editor" wire:model="description" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                                            </div>
                                            <script>
                                                    document.addEventListener('livewire:load', function () {
                                                        // Get the CSRF token from the meta tag
                                                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                                        CKEDITOR.replace('editor', {
                                                            // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                                                            // filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                                                            // filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                                                            // filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                                                            // filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                                                            // headers: {
                                                            //     'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                                                            // },
                                                            
                                                        });
                                            
                                                        CKEDITOR.instances.editor.on('change', function () {
                                                            @this.set('description', CKEDITOR.instances.editor.getData());
                                                        });
                                                        Livewire.on('formSubmitted', function () {
                                                        CKEDITOR.instances.editor.setData(''); // Reset CKEditor content
                                                        // document.querySelector('[wire:model="image"]').reset();

                                                                    });
                                                            });
                                            </script>
                                             @error('description') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

<div class="col-md-12">
<div class="mb-3" >
<label class="form-label">Description (Guj)</label>
<div wire:ignore>
    <textarea id="editor_guj" wire:model="description_guj" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
</div>
<script>
        document.addEventListener('livewire:load', function () {
            // Get the CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            CKEDITOR.replace('editor_guj', {
                // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                // filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                // filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                // filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                // filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                // headers: {
                //     'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                // },
                
            });

            CKEDITOR.instances.editor_guj.on('change', function () {
                @this.set('description_guj', CKEDITOR.instances.editor.getData());
            });
            Livewire.on('formSubmitted', function () {
            CKEDITOR.instances.editor_guj.setData(''); // Reset CKEditor content
            // document.querySelector('[wire:model="image"]').reset();

                        });
                });
</script>
 @error('description_guj') <span class="error">{{ $message }}</span> @enderror
</div>
</div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" wire:model="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive"> Inactive </option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editStaff" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editStaff">
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
