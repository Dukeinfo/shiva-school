<div>
    <!-- Main Content -->
    <section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('assets/images/header_bg.jpg');">
    <div class="opacity-full bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8 position-relative page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-orange margin-20px-bottom text-uppercase">Explore SIRS</h1>
                <h2 class="alt-font font-weight-700 title-large text-shadow-double-large text-white text-uppercase mb-0 letter-spacing-minus-4px margin-4-half-rem-bottom sm-no-text-shadow sm-letter-spacing-minus-1-half">
                    <span class="text-border text-border-width-2px">News</span><br /> Events
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="wow animate__fadeIn bg-light-gray padding-30px-tb sm-padding-20px-tb page-title-small" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-6 text-center text-lg-start">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block">News Event Details
                </h1>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-end breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-15px-top">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/news-event')}}">News Event</a></li>
                    <li>News Event Details</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@if($record)
<!-- start blog content section -->
<section class="half-section blog-right-side-bar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                <div class="row">
                    <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                        <ul class="list-unstyled margin-2-rem-bottom">
                            <li class="d-inline-block align-middle margin-25px-right"><i class="feather icon-feather-calendar text-orange margin-10px-right"></i><a href="javascript:void()">{{ \Carbon\Carbon::parse($record->created_at)->isoFormat('MMMM Do YYYY')}}</a></li>
                            <li class="d-inline-block align-middle margin-25px-right">
                            <li class="d-inline-block align-middle"><i class="feather icon-feather-user text-orange margin-10px-right"></i>By <a href="javascript:void()">Admin</a></li>
                        </ul>
                        <h5 class="alt-font font-weight-500 text-extra-dark-gray margin-4-half-rem-bottom">{{$record->heading}}</h5>
                        <img src="{{ isset($record->image) ? getboardmembers($record->image) : asset('no_image.jpg') }}" alt="" class="w-100 border-radius-6px margin-4-half-rem-bottom">
                        {!!$record->description!!}
                        
                    </div>
                </div>
            </div>
            <!-- start sidebar -->
            <aside class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-md-7 blog-sidebar lg-padding-4-rem-left md-padding-15px-left">
                
@php
$newsevents = App\Models\BoardMembers::where('status', 'Active')->get();              
@endphp      
                <div class="margin-5-rem-bottom xs-margin-35px-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-35px-bottom">Recent news events</span>
                    <ul class="latest-post-sidebar position-relative">
                        @if(isset($newsevents) && count($newsevents)>0  )
                          @foreach($newsevents as $key => $news) 
                        <li class="d-flex wow animate__fadeIn" data-wow-delay="0.2s">
                            <figure class="flex-shrink-0">
                                <a href="#"><img class="border-radius-3px" src="{{ getboardmembers($news->image ) ?? '' }}" alt=""></a>
                            </figure>
                            <div class="media-body flex-grow-1">
                                <a href="#" class="font-weight-500 text-extra-dark-gray d-inline-block margin-five-bottom md-margin-two-bottom">
                                {!!$news->heading ?str_limit($news->heading, $limit=30 ) : '' !!}</a>
                                <span class="text-medium d-block line-height-22px">

{!!$news->description ?str_limit($news->description, $limit=30 ) : '' !!}

                                </span>
                            </div>
                        </li>
                          @endforeach
                        @endif  
                    </ul>
                </div>
            </aside>
            <!-- end sidebar -->
        </div>
    </div>
</section>
<!-- end blog content section -->
@endif
    <!-- Main Content Ends-->
</div>
