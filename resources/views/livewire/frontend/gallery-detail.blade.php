<div>
      <!-- Main Content -->
     <section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('assets/images/header_bg.jpg');">
    <div class="opacity-full bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8 position-relative page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-orange margin-20px-bottom text-uppercase">Explore SIRS</h1>
                <h2 class="alt-font font-weight-700 title-large text-shadow-double-large text-white text-uppercase mb-0 letter-spacing-minus-4px margin-4-half-rem-bottom sm-no-text-shadow sm-letter-spacing-minus-1-half">
                    <span class="text-border text-border-width-2px">SIRS</span><br /> Gallery
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="wow animate__fadeIn bg-light-gray padding-30px-tb sm-padding-20px-tb page-title-small" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-6 text-center text-lg-start">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block">Gallery
                </h1>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-end breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-15px-top">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="javascript:void()">Explore SIRS</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="half-section">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-3 d-lg-block d-md-block d-sm-none d-none">
                <div id="sidebarWrap">
                    <div id="sidebar">
                        <h6 class="alt-font text-extra-dark-gray font-weight-500 w-85 xl-w-100 text-uppercase mb-0">Explore SIRS</h6>
                        <div class="alt-font font-weight-500 d-flex">
                            <span class="flex-shrink-0 w-30px h-1px bg-dark-purple opacity-7 align-self-center margin-20px-right"></span>
                            <div class="flex-grow-1"><span class="text-dark text-uppercase">&nbsp;</span>
                            </div>
                        </div>

                        <ul class="list-style-02 alt-font font-weight-500 text-small text-uppercase text-extra-dark-gray my-4">
                            <li class="padding-5px-bottom">
                                <a href="{{url('/blogs')}}" class="btn btn-large btn-transparent-royal-light-gray w-100">Blogs</a>
                            </li>
                            <li class="padding-5px-tb">
                                <a href="{{url('/news')}}" class="btn btn-large btn-transparent-royal-light-gray w-100">News</a>
                            </li>
                            <li class="padding-5px-tb">
                                <a href="{{url('/events')}}" class="btn btn-large btn-transparent-royal-light-gray w-100">Events</a>
                            </li>
                            <li class="padding-5px-tb">
                                <a href="{{url('/gallery')}}" class="btn btn-large btn-transparent-royal-light-gray btn-active w-100">Gallery</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @if($gallery)
                <div class="row">
                    <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                        <ul class="list-unstyled margin-2-rem-bottom">
                            <li class="d-inline-block align-middle margin-25px-right"><i class="feather icon-feather-calendar text-orange margin-10px-right"></i><a href="javascript:void()">
                           
                             {{ \Carbon\Carbon::parse($gallery->created_at)->isoFormat('MMMM Do YYYY')}}
                           
                           <!--  09 Septemper 2023 --></a></li>
                            <li class="d-inline-block align-middle margin-25px-right"><i class="feather icon-feather-folder text-orange margin-10px-right"></i><a href="javascript:void()">{{$category_name}}</a></li>
                        </ul>
                        <h5 class="alt-font font-weight-500 text-extra-dark-gray margin-4-half-rem-bottom">
                    
                        {{$gallery->title}}
                
                        <!-- Independence Day Celebration at School 2023 --></h5>
                        <!-- start slider -->
                        <div class="swiper-container h-auto" data-slider-options='{ "slidesPerView": 1, "loop": true, "pagination": { "el": ".swiper-pagination", "clickable": true }, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
@if(isset($records) && count($records)>0 )                      
    @foreach ($records as  $record) 
        @php
            $images = App\Models\GalleryImage::where('gallery_id',$record->id)->get(); 
        @endphp
            @if(isset($images) && count($images)>0 )                      
                @foreach ($images as  $image)
          <div class="swiper-slide"><img src="{{ getmultiple_images($image->image) }}" alt="" class="w-100">
          </div>
                @endforeach     
            @endif 
@endforeach     
@endif  
                            </div>
                            <!-- start slider pagination -->
                            <!--<div class="swiper-pagination swiper-light-pagination"></div>-->
                            <!-- end slider pagination -->
                            <div class="swiper-button-next-nav swiper-button-next light slider-navigation-style-01"><i class="feather icon-feather-arrow-right" aria-hidden="true"></i></div>
                            <div class="swiper-button-previous-nav swiper-button-prev light slider-navigation-style-01"><i class="feather icon-feather-arrow-left" aria-hidden="true"></i></div>
                        </div>
                        <!-- end slider -->
                    </div>
                </div>
                @else
               <!-- show no record found -->
<center><div class="alert alert-primary" role="alert">
          <strong>Sorry!</strong> No Record Found.
          </div>


                @endif
                

            </div>
        </div>
    </div>
</section>
    <!-- Main Content Ends-->

</div>
