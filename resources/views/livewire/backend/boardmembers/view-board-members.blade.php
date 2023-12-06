<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">News/Event Gallery</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">News/Event Gallery</li>
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
                            <h4 class="card-title">Add News Event</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Dated</label>
                                        <input type="text" class="form-control" id="dated"  wire:model="dated" placeholder="Dated" onchange='Livewire.emit("selectDate", this.value)' autocomplete="off">

                                        @error('dated') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                               
                               

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" id=""  wire:model="heading" placeholder="Heading">
                                        @error('heading') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">link</label>
                                        <input type="url" class="form-control" id=""  wire:model="link" placeholder="link">
                                        @error('link') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                
                            <div class="col-md-12">
                                <div class="mb-3" >
                                    <label class="form-label">Message </label>
                                
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

                                        
                             
                                 <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Image (width:1000 height:700)</label>
                                        <input type="file" class="form-control" id="" wire:model="image">
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
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
                                    <button wire:loading.attr="disabled" type="submit" wire:click="addEvent" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="addEvent">
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
                            <h4 class="card-title">Manage News Event</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Dated</th>
                                            <th>Image</th>
                                            <th>Heading</th>
                                            <th>Description</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->dated ?? '' }}</td>
                                            <td>@php      
$thumb = !empty($record->image) ? getThumbnail($record->thumbnail) : url('admin_assets/images/no-img.jpg');
@endphp                                      
<img src="{{$thumb}}" alt="" class="border" width="100" height="70"></td>
                                            
<td>{{$record->heading ?? '' }}</td>
<td>{!!Str::limit($record->description, 80) ?? ''!!}</td>
<td>{{$record->sort_id ?? '' }}</td>
<td>
@if($record->status  == "Active")
        <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
         @else
       <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
@endif</td>
                                            <td>
                                                <a href="{{route('edit_boardmembers',$record->id )}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg" wire:click="delete({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                  @endforeach
                                      @else
                                 <tr>
                                 <td colspan="5"> Record Not Found</td>
                                
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
