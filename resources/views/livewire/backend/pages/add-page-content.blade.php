<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage All  Static Pages Content</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Add Pages Content</li>
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
                            <h4 class="card-title">Add Content</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Menu <span class="text-danger">*</span></label>
                                        <select class="form-select" wire:model="menu">
                                                <option value="">Select</option>
                                            @if(isset($getMenus))
                                            @foreach($getMenus as $menu)
                                              <option value="{{$menu->id}}"> {{$menu->name}}</option>
                                            @endforeach
                                        @endif 
                                              
                                        </select>
                                         @error('menu') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Menu <span class="text-danger">*</span></label>
                                        <select class="form-select" wire:model="submenu">
                                                <option value="">Select</option>
                                               @if (!is_null($subMenus)) 
                                                @foreach($subMenus as $submenu)
                                                   <option value="{{ $submenu->id }}">{{ $submenu->name }}</option>
                                              @endforeach
                                               @endif 
                                              
                                        </select>
                                         @error('submenu') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div> --}}

                                
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Route Name <span class="text-danger">*</span></label>
                                        <select name="selected_route" wire:model="name" id="selected_route"  class="form-control">
                                         <option value="{{NULL}}" >Select page</option>
                                          
                                            @foreach(Route::getRoutes() as $route)
                                            @if (str_starts_with($route->getName(), 'home.') )
                                            @php
                                            $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                           @endphp
                                      <option value="{{ $route->getName() }}" 
                                        @if(in_array($route->getName(), [ 
'home.homepage',
'home.activities',
'home.contact_us',
'home.gallery',
'home.gallery_detail',
'home.gallery_detail',
'home.curricular_facilities',
'home.cocurricular_facilities',
'home.members_of_trust',
'home.news_events',
'home.societies',
'home.student_headlines',
'home.testimonials',
'home.vision_and_mission',
  ])) disabled @endif
                                          class="form-control">{{ str_replace('_' , ' ',$routeName)}}</option>
                                               
                                           @endif
                                                @endforeach
                                        </select>
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

<div class="col-md-12">
<div class="mb-3">
    <label class="form-label">Heading <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id=""  wire:model="heading" placeholder="Heading">
    @error('heading') <span class="error">{{ $message }}</span> @enderror
</div>
</div>

<div class="col-md-12">
<div class="mb-3">
    <label class="form-label">Sub Heading <span class="text-danger"></span></label>
    <input type="text" class="form-control" id=""  wire:model="sub_heading" placeholder="Heading">
    @error('sub_heading') <span class="error">{{ $message }}</span> @enderror
</div>
</div>

<div class="col-md-12">
<div class="mb-3" >
    <label class="form-label">Description<span class="text-danger">*</span></label>
  

<div wire:ignore>
     <textarea id="editor" wire:model="desc" placeholder="Description of Event" class="form-control xtra-cat"></textarea>


    </div>
    @error('desc') <span class="error">{{ $message }}</span> @enderror

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
                });
        });
    </script>


                                       
</div>
</div>




                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="" wire:model="image" >
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Redirect or Target Link </label>
                                    <input type="text" class="form-control" id="" wire:model="link"  placeholder="Link">
                                    @error('link') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order# <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" wire:model="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive </option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="addContent" class="btn btn-primary w-md">Save</button>
                                </div>
                                 <div wire:loading wire:target="addContent">
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
                            <h4 class="card-title">Manage Page</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Route</th>
                                            <th>Heading</th>
                                            <th>Sub Heading</th>
                                            
                                             <th>Image</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->Menu->name ?? '' }}</td>
                                             <td>{{$record->name ?? '' }}</td>
                                            <td>
                                             {{$record->heading ?? '' }}  
                                            </td>
                                            <td>
                                             {{$record->sub_heading ?? '' }}  
                                            </td>
                                             
                                              <td>  
                                            @php      
$thumb = !empty($record->image) ? getThumbnail($record->thumbnail) : url('admin_assets/images/no-img.jpg');
@endphp                                      
<img src="{{$thumb}}" alt="" class="border" width="100" height="70">            
                                            </td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td>
                                                @if($record->status  == "Active")
                                                        <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
                                                        @else
                                                    <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
                                                @endif</td>
                                            <td>
                                                
                                                <a href="{{route('edit_content',['id' => $record->id])}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
