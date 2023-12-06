  <footer class="footer-dark bg-royal-blue" id="footer">
    <div class="footer-top padding-five-tb lg-padding-eight-tb md-padding-50px-tb">
    @php
     $contactInfo = App\Models\ContactInfo::orderBy('sort_id','asc')->where('status','Active')->first();
    @endphp 
        <div class="container">
            <div class="row">
                <!-- start footer column -->
                <div class="col-12 col-lg-3 col-sm-6 order-sm-1 order-lg-0 last-paragraph-no-margin md-margin-40px-bottom xs-margin-25px-bottom">
                    <span class="alt-font font-weight-500 text-uppercase letter-spacing-1px d-block text-white margin-20px-bottom">About School</span>
                    <p class="w-95 lg-w-100">
                          {!! isset($contactInfo->disclaimer) 
                             ? 
                             str_limit($contactInfo->disclaimer, $limit=115 )
                              : 'Lorem ipsum is simply dummy text of the printing and industry. Lorem ipsum has been the industry industry standard dummy text.'!!}
                    </p>
@php        
$facebook = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Facebook'])->first();
$twitter = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Twitter'])->first();
$instagram = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Instagram'])->first();
$youtube = App\Models\SocialApp::orderBy('sort_id','asc')->where(['status' => 'Active' , 'category' =>'Youtube'])->first();
@endphp                     
                    <div class="social-icon-style-12 mt-4">
                        <ul class="extra-small-icon light">
                       @if($facebook) 
                        <li><a class="facebook" href="{{$facebook->link ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                       @else     
                            <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                       @endif    
                       
                       @if($twitter) 
                        <li><a class="twitter" href="{{$twitter->link ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                       @else  
                            <li><a class="twitter" href="http://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                       @endif  
                       @if($instagram) 
                        <li><a class="instagram" href="{{$instagram->link ?? ''}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                       @else   
                            <li><a class="instagram" href="http://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                       @endif
                       
                       @if($youtube) 
                         <li><a class="youtube" href="{{$youtube->link ?? ''}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                       @else     
                            <li><a class="youtube" href="http://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        @endif
                        </ul>
                    </div>
                </div>
                <!-- end footer column -->

@php
$quickLinks = App\Models\FooterLink::orderBy('sort_id','asc')->where(['status' => 'Active','category' => 'Quick Links'])->get(); 

$moreLinks = App\Models\FooterLink::orderBy('sort_id','asc')->where(['status'=> 'Active','category'=>'More Links'])->get(); 
@endphp                
                <!-- start footer column -->
                <div class="col-12 col-lg-2 offset-sm-1 col-sm-5 order-sm-2 order-lg-0 md-margin-40px-bottom xs-margin-25px-bottom">
                    <span class="alt-font font-weight-500 text-uppercase d-block text-white margin-20px-bottom">Quick Links</span>
                    <ul class="list-unstyled">
                @if(isset($quickLinks) && count($quickLinks) >0 )
                              @foreach($quickLinks as  $links)   
                @php
                $link = str_replace('home.', '', $links->pname);
                $quicklink=str_replace('_', '-', $link);
                @endphp 
                <li><a href="{{url($quicklink)}}">{{$links->pagetitle}}</a></li>
                @endforeach
                @endif 
                  
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-12 col-lg-2 col-sm-5 offset-sm-1 offset-lg-0 order-sm-4 order-lg-0 xs-margin-25px-bottom">
                    <span class="alt-font font-weight-500 text-uppercase d-block text-white margin-20px-bottom">More Links</span>
                    <ul class="list-unstyled">
                @if(isset($moreLinks) && count($moreLinks) >0 )
                              @foreach($moreLinks as  $links)   
                @php
                $link = str_replace('home.', '', $links->pname);
                $morelink=str_replace('_', '-', $link);
                @endphp 
                <li><a href="{{url($morelink)}}">{{$links->pagetitle}}</a></li>
                @endforeach
                @endif 
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-sm-6 order-sm-3 order-lg-0">
                    <span class="alt-font font-weight-500 text-uppercase d-block text-white margin-20px-bottom">Get in Touch</span>
                    <p class="w-85 margin-15px-bottom"> 
                    {{$contactInfo->address ?? 'Ghumarwin Distt - Bilaspur, Himachal Pradesh - 174021'}}
                    </p>
                    <a href="tel:9805092582"><i class="feather icon-feather-phone-call icon-very-small margin-10px-right text-white"></i>+91 {{$contactInfo->phone ?? '+91 9805092582'}}</a>
                    <div><i class="feather icon-feather-mail icon-very-small margin-10px-right text-white"></i><a href="mailto:shivagroupschool@gmail.com">
                     {{$contactInfo->email ?? 'shivagroupschool@gmail.com'}}</a></div>
                </div>
                <!-- end footer column -->
            </div>
        </div>
    </div>
    <div class="footer-bottom padding-35px-tb bg-royal-blue2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 sm-margin-10px-bottom xs-margin-15px-bottom">
                    <ul class="footer-horizontal-link d-flex flex-column flex-sm-row justify-content-sm-center justify-content-md-start">
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Legal notice</a></li>
                        <li><a href="#">Terms of service</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 text-start text-sm-center text-md-end last-paragraph-no-margin">
                    <p>&copy; {{ now()->year }} SIRS. All Rights Reserved. Powered by <a href="#" target="_blank">Duke Infosys</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>