<div>
        <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Testimonials</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Testimonials</li>
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
                            <h4 class="card-title">Manage Testimonials</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Message</th>
                                            <th>Sort#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      @if(isset($records) && count($records)>0 )                      
                       @foreach ($records as  $record)                     
                                
                                        <tr>
                                            <td>{{$record->name ?? '' }}</td>
                                            <td>
@php
$thumb = !empty($record->photo) ? getThumbnail($record->thumbnail)  : url('admin_assets/images/no-img.jpg');
@endphp                                      
<img src="{{$thumb}}" alt="" class="border" width="100" height="70">
                                            </td>
                                            <td>
                                                {!! $record->description  ?? '' !!}
                                            </td>
                                            <td>{{$record->sort_id  ?? ''}}</td>
                                            <td>
                                                @if($record->status  == "Active")
                                                    <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
                                                @else
                                                    <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
                                                @endif
                                                <td>
                                           
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Restore"><i class="fa fa-times fa-fw fa-lg" wire:click="restore({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                   @endforeach
                                      @else
                                 <tr>
                                 <td colspan="6"> Record Not Found</td>
                                
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
