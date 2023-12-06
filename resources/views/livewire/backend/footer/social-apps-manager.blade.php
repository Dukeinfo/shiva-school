<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Social App links</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Social App  </li>
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
                            <h4 class="card-title"> Manage Social App </h4>
                        </div>

                        
                        <div class="card-body">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                                <!-- resources/views/livewire/social-apps-manager.blade.php -->




                        @if ($isEditing)
                            <h2>Edit Social App</h2>
                        @else
                            <h2>Create Social App</h2>
                        @endif

                            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" enctype="multipart/form-data">
                                <div class="row g-3">
                                        <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" wire:model="category">
                                                <option value="">Select</option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="Twitter">Twitter </option>
                                                <option value="Instagram">Instagram </option>
                                                <option value="Youtube">Youtube </option>
                                        </select>
                                         @error('category') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                  
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" wire:model.defer="link" id="link" class="form-control @error('link') is-invalid @enderror">
                                                @error('link')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                  
                                  

                                    <div>
                                        <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md">{{ $isEditing ? 'Update' : 'Save' }}</button>
                                    </div>
                               
                                </div>
                            </form>




                    </div>
                </div>
            </div>
            <!-- end row -->
          
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Update Contact </h4>
                        </div>
                        <div class="card-body">
                        
                            <h2>Social Apps List</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($socialApps as $socialApp)
                                        <tr>
                                             <td>{{ $socialApp->category }}</td>
                                            
                                            <td><a href="{{ $socialApp->link }}" target="_blank">{{ $socialApp->link }}</a></td>
                                            
                                            <td>
                                                <button wire:click="edit({{ $socialApp->id }})" class="btn btn-sm btn-primary">Edit</button>
                                                <button wire:click="delete({{ $socialApp->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
   
</div>
</div>