<div>
     <!-- Main Content -->
    <section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('assets/images/header_bg.jpg');">
    <div class="opacity-full bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8 position-relative page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-orange margin-20px-bottom text-uppercase">Get Connected</h1>
                <h2 class="alt-font font-weight-700 title-large text-shadow-double-large text-white text-uppercase mb-0 letter-spacing-minus-4px margin-4-half-rem-bottom sm-no-text-shadow sm-letter-spacing-minus-1-half">
                    <span class="text-border text-border-width-2px">Contact</span><br /> Shiva
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="wow animate__fadeIn bg-light-gray padding-30px-tb sm-padding-20px-tb page-title-small" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-6 text-center text-lg-start">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block">Contact Us
                </h1>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-end breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-15px-top">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
            <!-- start feature box item -->
            <div class="col md-margin-50px-bottom sm-margin-30px-bottom">
                <div class="feature-box text-center">
                    <div class="feature-box-icon">
                        <i class="line-icon-Geo2-Love icon-extra-medium text-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">Locate Us</span>
                        <p class="d-inline-block w-70 lg-w-90 md-w-60 sm-w-80 xs-w-100">Ghumarwin Distt - Bilaspur (H.P.) - 174021 </p>
                    </div>
                </div>
            </div>
            <!-- end feature box item -->
            <!-- start feature box item -->
            <div class="col md-margin-50px-bottom sm-margin-30px-bottom">
                <div class="feature-box text-center">
                    <div class="feature-box-icon">
                        <i class="line-icon-Headset icon-extra-medium text-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">Let's Talk</span>
                        <p>Phone: +91 9805092582<br>Fax: 1-800-222-002</p>
                    </div>
                </div>
            </div>
            <!-- end feature box item -->
            <!-- start feature box item -->
            <div class="col xs-margin-30px-bottom">
                <div class="feature-box text-center">
                    <div class="feature-box-icon">
                        <i class="line-icon-Mail-Read icon-extra-medium text-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">E-mail Us</span>
                        <p><a href="mailto:shivagroupschool@gmail.com" class="text-sky-blue-hover">shivagroupschool@gmail.com</a><br><a href="mailto:info@shivagroupschool.com" class="text-light-blue text-sky-blue-hover">info@shivagroupschool.com</a></p>
                    </div>
                </div>
            </div>
            <!-- end feature box item -->
            <!-- start feature box item -->
            <div class="col">
                <div class="feature-box text-center">
                    <div class="feature-box-icon">
                        <i class="line-icon-Information icon-extra-medium text-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                    </div>
                    <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">Customer Services</span>
                        <p class="d-inline-block w-70 lg-w-90 md-w-60 sm-w-80 xs-w-100">Lorem ipsum is simply dummy the printing</p>
                    </div>
                </div>
            </div>
            <!-- end feature box item -->
        </div>
    </div>
</section>
<!-- end section -->

<!-- start section -->
<section class="py-0 bg-light">
    <div class="container">
        <div class="padding-8-rem-all md-padding-5-rem-all xs-padding-4-rem-tb xs-padding-2-rem-lr wow animate__fadeIn">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-6 col-lg-7 text-center margin-4-half-rem-bottom md-margin-3-rem-bottom">
                    <span class="alt-font letter-spacing-minus-1-half text-extra-medium d-block margin-5px-bottom">Fill out the form and we'll be in touch soon!</span>
                    <h4 class="alt-font font-weight-600 text-extra-dark-gray">How we can help you?</h4>
                </div>
                <div class="col-12">
                    <!-- start contact form -->
                  <form  wire:submit.prevent="send">
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col margin-4-rem-bottom sm-margin-25px-bottom">
                                <input class="medium-input bg-white margin-25px-bottom" type="text" wire:model="name" placeholder="Your name" >
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                <input class="medium-input bg-white margin-25px-bottom" type="text" wire:model="email" placeholder="Your email address">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                <input class="medium-input bg-white mb-0" type="phone" wire:model="phone" placeholder="Your mobile">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col margin-4-rem-bottom sm-margin-20px-bottom">
                                <textarea class="medium-textarea bg-white h-200px" rows="6"  wire:model="message"  placeholder="Your message"></textarea>
                                  @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col text-start sm-margin-25px-bottom">
                                <input type="checkbox" wire:model="terms_condition"   value="1" class="terms-condition d-inline-block align-top w-auto mb-0 margin-5px-top margin-10px-right">
                                @error('terms_condition') <span class="text-danger">{{ $message }}</span> @enderror 
                                <label for="terms_condition" class="text-small d-inline-block align-top w-85 md-w-90 xs-w-85">I accept the terms & conditions and I understand that my data will be hold securely in accordance with the <a href="javascript:void()" target="_blank" class="text-decoration-underline text-extra-dark-gray">privacy policy</a>.</label>
                             
                            </div>
                            <div class="col text-center text-md-end">
                                <button  class="btn btn-medium btn-royal-blue " type="submit">Send Message</button>
                            </div>
                            @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                            @endif
                        </div>
                        <div class="form-results d-none"></div>
                    </form>
                    <!-- end contact form -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-0 my-0">
    <div class="row">
        <div class="col-lg-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54523.85834897318!2d76.7246736932252!3d31.338521131051895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39053f1bdf47a49d%3A0xd7c8488b3d2ddb34!2sBilaspur%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1695807065769!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


<section class="half-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 col-md-7 col-sm-6 text-center text-sm-start sm-margin-25px-tb xs-margin-30px-bottom">
                <h6 class="alt-font text-extra-dark-gray font-weight-500 margin-10px-bottom">We develop your child's future.</h6>
                <a href="javascript:void()" class="btn btn-extra-large btn-link text-orange">Know More</a>
            </div>
            <div class="col-12 col-lg-6 col-md-5 col-sm-6 social-icon-style-03 text-center text-sm-end sm-margin-25px-tb xs-no-margin-top">
                <span class="alt-font text-medium d-block margin-10px-bottom">Connect with social media</span>
                <ul class="small-icon">
                    <li><a class="facebook text-extra-dark-gray text-center" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="twitter text-extra-dark-gray text-center" href="http://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="instagram text-extra-dark-gray text-center" href="http://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a class="linkedin text-extra-dark-gray text-center" href="http://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section> 
    <!-- Main Content Ends-->

</div>
