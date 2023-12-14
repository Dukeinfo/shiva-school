<header class="header-with-topbar">
       <div class="top-bar bg-royal-blue d-none d-md-inline-block padding-35px-lr md-no-padding-lr text-white">
@php        
$facebook = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Facebook'])->first();
$twitter = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Twitter'])->first();
$instagram = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Instagram'])->first();
$youtube = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Youtube'])->first();
@endphp        
    <div class="container-fluid nav-header-container">
        <div class="d-flex flex-wrap align-items-center">
            <div class="col-12 text-center text-sm-start col-sm-auto me-auto ps-lg-0">
                <ul class="social-icon padding-5px-tb">
                   @if($facebook) 
                    <li><a class="text-white" href="{{$facebook->link ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                   @else
                    <li><a class="text-white" href="http://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  @endif
                    
                 @if($twitter)  
                 <li><a class="text-white" href="{{$twitter->link ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                 @else 
                    <li><a class="text-white" href="http://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                 @endif  

                 @if($instagram)
                  <li><a class="text-white" href="{{$instagram->link ?? ''}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                 @else 
                    <li><a class="text-white" href="http://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                 @endif  
                 
                 @if($youtube)
                  <li><a class="text-white" href="{{$youtube->link ?? ''}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                 @else 
                    <li><a class="text-white" href="http://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                 @endif   
                </ul>
            </div>
@php
$contactInfo = App\Models\ContactInfo::orderBy('id','desc')->where('status','Active')->first();
@endphp         
            <div class="col-auto d-none d-sm-block text-end px-lg-0 font-size-0">
                <div class="top-bar-contact">
                    <a href="tel:9805092582" class="top-bar-contact-list text-white">
                        <i class="feather icon-feather-phone-call icon-extra-small text-white"></i>
                        {{$contactInfo->phone ?? '+91 9805092582'}}
                    </a>
                    <a href="mailto:shivagroupschool@gmail.com" class="top-bar-contact-list d-none d-md-inline-block no-border-right pe-0 text-white">
                        <i class="feather icon-feather-mail icon-extra-small text-white"></i>
                        {{$contactInfo->email ?? 'shivagroupschool@gmail.com'}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
      <nav class="navbar navbar-expand-lg top-space navbar-light bg-white header-light fixed-top navbar-boxed header-reverse-scroll py-2">
    <div class="container-fluid nav-header-container">
        <div class="col-6 col-lg-3 me-auto ps-lg-0">
            <a class="navbar-brand" href="{{url('/')}}">
               @if (isset($contactInfo->logo))
                <img src="{{ asset('storage/' . $contactInfo->logo) }}" class="default-logo img-fluid" alt="">
                <img src="{{ asset('storage/' . $contactInfo->logo) }}" class="alt-logo" alt="">
                <img src="{{ asset('storage/' . $contactInfo->logo) }}" class="mobile-logo" alt="">
               @else 
                 
                <img src="{{asset('assets/images/logo.png')}}" class="default-logo img-fluid" alt="">
                <img src="{{asset('assets/images/logo.png')}}" class="alt-logo" alt="">
                <img src="{{asset('assets/images/logo.png')}}" class="mobile-logo" alt="">
               @endif 
            </a>
        </div>
        <div class="col-auto menu-order px-lg-0">
            <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
            </button>
            <div class=" collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav alt-font">
@php
$menus = App\Models\Menu::orderBy('sort_id','asc')->where('status','Active')->get();     
@endphp    
          @if(isset($menus) )
            @foreach($menus as $menu)

@php
$submenusTotal =App\Models\Submenu::where('menu_id', $menu->id)->count();

 $submenus = App\Models\Submenu::with(['Menu'])->where('cms', 'No')
            ->where('menu_id', $menu->id)
            ->orderBy('sort_id', 'asc')
            ->where('parent_id', NULL)
            ->where('status', 'Active')
            ->get();   


$getpage = App\Models\CreatePage::where('menu_id', $menu->id)
            ->with(['SubMenu'])
            ->orderBy('sort_id', 'asc')
            ->where('status', 'Active')
            ->groupBy('submenu_id')
            ->get();

@endphp


                 
                <!--add dropdown class if menu has submenus -->
                 <li class="@if($submenusTotal==0)  nav-item @else nav-item dropdown simple-dropdown @endif">  
                    
                @if(isset($menu->link) ) 
                <!-- if menu has link -->
                    <a href="{{ !empty($menu->link) ? route($menu->link) : '#' }}" class="nav-link text-uppercase">{{$menu->name ?? ''}} </a>
                @else
                <!-- if menu has no link -->
                <a href="javascript:void(0)" class="nav-link text-uppercase">{{$menu->name ?? ''}} </a>
                @endif    
                        <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                        <!-- subenus from create page -->  
                        @foreach($getpage as $page)
                           @if($page->SubMenu->cms == 'Yes' && $page->SubMenu->status == 'Active' )    
                            <li class="dropdown">
                                <a href="{{ route('detail_page', ['page_id' => $page->id ?? '', 'slug' => $page->SubMenu->slug ?? '']) }}">{{$page->SubMenu->name ?? ''}}</a>
                            </li>
                            @else
                            @endif
                           @endforeach 
                        <!-- subenus from create page end --> 


                        <!-- submenus start -->
                      @if(isset($submenus) )   
                           @foreach($submenus as $submenu)
                                @php
                                 $checkParent = App\Models\Submenu::
                                             where('parent_id', $submenu->id)
                                            ->where('status', 'Active')
                                            ->first();


                                @endphp            
                             <li class="dropdown">

                            @if(isset($checkParent) )
                            <a data-bs-toggle="dropdown" href="javascript:void(0);">{{$submenu->name ?? ''}}
                            @else
                            <a href="{{ isset($submenu->pname) ? route($submenu->pname) : '#' }}">{{$submenu->name ?? ''}}
                            @endif    
                         @if(isset($checkParent) ) 
                         <!-- show toggle for nested -->  
                            <i class="fas fa-angle-right dropdown-toggle"></i>
                         @endif   
                        </a>
                           <!-- nested submenus check -->
                            @if(isset($checkParent) )
                              @php
                                 $nestedSubmenus = App\Models\Submenu::
                                             where('parent_id', $submenu->id)
                                            ->where('status', 'Active')
                                            ->get();
                                @endphp
                                <!-- nested submenus start --> 
                                <ul class="dropdown-menu">
                                    @if(isset($nestedSubmenus) )
                                      @foreach($nestedSubmenus as $nested)
                                    <li><a href="{{ isset($nested->pname) ? route($nested->pname) : '#' }}">{{$nested->name ?? ''}}</a></li>
                                     @endforeach
                                   @endif
                                </ul>
                                @endif
                                  <!-- nested submenus end -->
                            </li>
                           @endforeach
                       <!-- submenus end -->
                     @endif      
                        </ul>
                    </li>
                 @endforeach
            @endif
                </ul>
            </div>
        </div>
        <div class="col-auto text-end hidden-xs pe-0 font-size-0">
            <div class="header-search-icon search-form-wrapper">
                <a href="javascript:void(0)" class="search-form-icon header-search-form"><i class="feather icon-feather-search"></i></a>
                <!-- start search input -->
                <div class="form-wrapper">
                    <button title="Close" type="button" class="search-close alt-font">×</button>
                    <form id="search-form" role="search" method="get" class="search-form text-start" action="#">
                        <div class="search-form-box">
                            <span class="search-label alt-font text-small text-uppercase text-medium-gray">What are you looking for?</span>
                            <input class="search-input alt-font" id="search-form-input5e219ef164995" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off">
                            <button type="submit" class="search-button">
                                <i class="feather icon-feather-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- end search input -->
            </div>
            <div class="header-push-button d-none d-lg-inline-block hidden-xs">
                <a href="javascript:void(0);" class="push-button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>
<div class="push-menu padding-50px-lr bg-white">
    <a href="javascript:void(0);" class="close-menu text-extra-dark-gray"><i class="fas fa-times"></i></a>
    <div class="push-menu-wrapper text-center" data-scroll-options='{ "theme": "dark" }'>
        <h1 class="text-extra-dark-gray alt-font font-weight-700 letter-spacing-minus-3px text-uppercase no-margin-bottom">Hello.</h1>
        <span class="alt-font text-large text-uppercase d-block margin-30px-bottom">Let's talk.</span>
        
        <div class="margin-5-rem-bottom text-center lg-margin-3-rem-bottom">
            <span class="alt-font text-large margin-3-rem-bottom w-70 mx-auto text-extra-dark-gray d-inline-block line-height-26px lg-margin-2-rem-bottom">Get latest update for our residentail school</span>
            <form action="#" method="post">
                <div class="newsletter-email position-relative">
                    <input class="border-radius-5px medium-input m-0 required" name="email" placeholder="Enter your email address" type="email">
                    <input type="hidden" name="redirect" value="">
                    <button class="btn btn-medium line-height-18px submit" type="submit"><i class="far fa-envelope text-extra-dark-gray left-icon"></i>subscribe</button>
                    <div class="form-results rounded d-none position-absolute"></div>
                </div>
            </form>
        </div>
        <div class="text-center elements-social social-icon-style-04 margin-10px-bottom">
            <ul class="small-icon dark">
                <li><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a class="instagram" href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a class="youtube" href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</div>
    </header>