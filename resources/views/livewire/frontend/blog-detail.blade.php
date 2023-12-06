<div>
      <!-- Main Content -->
    <section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('assets/images/header_bg.jpg');">
    <div class="opacity-full bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8 position-relative page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-orange margin-20px-bottom text-uppercase">Explore SIRS</h1>
                <h2 class="alt-font font-weight-700 title-large text-shadow-double-large text-white text-uppercase mb-0 letter-spacing-minus-4px margin-4-half-rem-bottom sm-no-text-shadow sm-letter-spacing-minus-1-half">
                    <span class="text-border text-border-width-2px">Blog</span><br /> Details
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="wow animate__fadeIn bg-light-gray padding-30px-tb sm-padding-20px-tb page-title-small" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-6 text-center text-lg-start">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block">Blog Details
                </h1>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-end breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-15px-top">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/blogs')}}">Blogs</a></li>
                    <li>Blog Details</li>
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
                            <li class="d-inline-block align-middle margin-25px-right"><i class="feather icon-feather-folder text-orange margin-10px-right"></i><a href="javascript:void()">{{ getBlogCategory($record->category_id) ?? '' }}</a></li>
                            <li class="d-inline-block align-middle"><i class="feather icon-feather-user text-orange margin-10px-right"></i>By <a href="javascript:void()">Administrator</a></li>
                        </ul>
                        <h5 class="alt-font font-weight-500 text-extra-dark-gray margin-4-half-rem-bottom">{{$record->title}}</h5>
                        <img src="{{asset('assets')}}/images/blog1.jpg" alt="" class="w-100 border-radius-6px margin-4-half-rem-bottom">
                        {!!$record->description!!}
                        
                    </div>
                </div>
            </div>

@php
$blogs = App\Models\Blogs::where('status', 'Active')->get();              
@endphp      
            <!-- start sidebar -->
            <aside class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-md-7 blog-sidebar lg-padding-4-rem-left md-padding-15px-left">
                <div class="d-inline-block w-100 margin-5-rem-bottom">
                    <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-25px-bottom">Search posts</span>
                    <form id="search-form" role="search" method="get" action="#">
                        <div class="position-relative">
                            <input class="search-input medium-input border-color-medium-gray border-radius-4px mb-0" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off" />
                            <button type="submit" class="bg-transparent btn text-orange position-absolute right-5px top-8px text-medium md-top-8px sm-top-10px search-button"><i class="feather icon-feather-search ms-0"></i></button>
                        </div>
                    </form>
                </div>
@php
$categories = App\Models\BlogCategory::where('status', 'Active')->get();              
@endphp
                <div class="margin-5-rem-bottom xs-margin-35px-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-35px-bottom">Categories</span>
                    <ul class="list-style-07 list-unstyled">
                      @if(isset($categories) && count($categories) >0 )
                           @foreach($categories as $category)
                        <li><a href="javascript:void()">{{$category->name}}</a>
@php
      $total =App\Models\Blogs::where(['category_id'=> $category->id , 'status' => 'Active' ])->count();
 @endphp
                    <span class="item-qty">{{$total}}</span></li>
                        @endforeach
                      @endif  
                    </ul>
                </div>
                <div class="margin-5-rem-bottom xs-margin-35px-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-35px-bottom">Recent posts</span>
                    <ul class="latest-post-sidebar position-relative">
                        @if(isset($blogs) && count($blogs)>0  )
                          @foreach($blogs as $key => $blog) 
                        <li class="d-flex wow animate__fadeIn" data-wow-delay="0.2s">
                            <figure class="flex-shrink-0">
                                <a href="#"><img class="border-radius-3px" src="{{ getBlogImage($blog->image ) ?? '' }}" alt=""></a>
                            </figure>
                            <div class="media-body flex-grow-1">
                                <a href="#" class="font-weight-500 text-extra-dark-gray d-inline-block margin-five-bottom md-margin-two-bottom">{{$blog->title}}</a>
                                <span class="text-medium d-block line-height-22px">

{!!$blog->description ?str_limit($blog->description, $limit=80 ) : '' !!}

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
@endif
<!-- end blog content section -->
    <!-- Main Content Ends-->

</div>
