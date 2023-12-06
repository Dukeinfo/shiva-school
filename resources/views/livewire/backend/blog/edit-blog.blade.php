<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add/Update Blog</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add/Update Blog</li>
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
                            <h4 class="card-title">Update Blog</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            <!--form starts-->
                            <div class="row g-3">
                               <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select"   wire:model="category_id">
                                            <option value=""> Select category</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                              <option value="{{$category->id}}"> {{$category->name}}</option>
                                            @endforeach
                                        @endif    
                                            </select>
                                        @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>

</div>
         
<div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" id="blogDate"  wire:model="blogdate" placeholder="Date" onchange='Livewire.emit("selectDate", this.value)' autocomplete="off">

                                        @error('blogdate') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                
                                <div class="col-md-12">
<div class="mb-3">
<label class="form-label">Blog Title</label>
<input type="text" class="form-control" id="" wire:model="title" placeholder="">
@error('title') <span class="error">{{ $message }}</span> @enderror
</div>
</div>
<div class="col-md-12">
<div class="mb-3" wire:ignore>
<label class="form-label">Description</label>

<textarea id="editor" wire:model="desc" placeholder="Description of Event" class="form-control xtra-cat"></textarea>

<script>
document.addEventListener('livewire:load', function () {
CKEDITOR.replace('editor');

CKEDITOR.instances.editor.on('change', function () {
@this.set('desc', CKEDITOR.instances.editor.getData());
});

Livewire.on('formSubmitted', function () {
CKEDITOR.instances.editor.setData(''); // Reset CKEditor content                          document.querySelector('[wire:model="image"]').reset();

});
});
</script>
@error('desc') <span class="error">{{ $message }}</span> @enderror
</div>
</div>                                

                                <div class="col-md-4">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Blog Image (width:1000 height:700)</label>
                                        <input type="file" wire:model="editimage" id="" class="form-control">

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
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sort Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort" placeholder="Number">
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
                                    <button type="submit" class="btn btn-primary w-md" wire:click="editBlog">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editBlog">
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
