<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="@yield('seo_description')">
    <meta name="keywords" content="@yield('seo_keywords')">

    {!! SEO::generate() !!}
    {{-- @stack('keywords') --}}
    <!-- BEGIN: CSS -->
    @php
        $headerSnippets = App\Models\Headersnippets::get();
    @endphp
        @forelse($headerSnippets as $snippet)
            {{ $snippet->description }}
        @empty
        @endforelse

    <!-- SITE TITLE -->
    <title>Shiva International Residential School</title>
    <!-- style sheets and font icons  -->
     <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/font-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/theme-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/responsive.css" />

    <!-- LIVEWIRE STYLES -->
     @livewireStyles
</head>

<body data-mobile-nav-style="classic">
    <!-- start header -->
      @include('livewire.frontend.common.header')
    <!-- end header -->

    <!-- Main Content -->
    
     {{ $slot }}

    <!-- Main Content Ends-->

    <!-- start footer -->
     @include('livewire.frontend.common.footer')
    <!-- end footer -->

    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
    <!-- end scroll to top -->

     @livewireScripts

    <!-- javascript -->
     <script type="text/javascript" src="{{asset('assets')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/js/theme-vendors.min.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/js/main.js"></script>
    <!-- sticy sidebar js -->
    <script type="text/javascript">
        $(function() {
            var top = $('#sidebar').offset().top - parseFloat($('#sidebar').css('marginTop').replace(/auto/, 0));
            var footTop = $('#footer').offset().top - parseFloat($('#footer').css('marginTop').replace(/auto/, 0));

            var maxY = footTop - $('#sidebar').outerHeight();

            $(window).scroll(function(evt) {
                var y = $(this).scrollTop();
                if (y > top) {
                    if (y < maxY) {
                        $('#sidebar').addClass('fixed').removeAttr('style');
                    } else {
                        $('#sidebar').removeClass('fixed').css({
                            position: 'absolute',
                            top: (maxY - top) + 'px'
                        });
                    }
                } else {
                    $('#sidebar').removeClass('fixed');
                }
            });
        });
    </script>
</body>

</html>