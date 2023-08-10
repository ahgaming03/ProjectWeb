<!DOCTYPE html>
<html lang="en">
    
{{-- show all session --}}
{{-- {{ dd(session()->all()) }} --}}

<!-- index-331:38-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gaming Gear | Project Web (WEBG301)</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{ asset('customer/css/material-design-iconic-font.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('customer/css/font-awesome.min.css') }}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ asset('customer/css/fontawesome-stars.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/meanmenu.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/owl.carousel.min.css') }}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/slick.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/animate.css') }}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/jquery-ui.min.css') }}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/venobox.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/nice-select.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/magnific-popup.css') }}">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/helper.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('customer/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/responsive.css') }}">
    <!-- Modernizr js -->
    <script src="{{ asset('customer/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!-- Font awesome icon -->
    <script src="https://kit.fontawesome.com/a3bd2a4259.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">

        @include('customer.layouts.header')

        {{-- Begin content --}}
        @yield('content')
        {{-- End conntent --}}

        @include('customer.layouts.footer')


    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="{{ asset('customer/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('customer/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="{{ asset('customer/js/bootstrap.min.js') }}"></script>
    <!-- Ajax Mail js -->
    <script src="{{ asset('customer/js/ajax-mail.js') }}"></script>
    <!-- Meanmenu js -->
    <script src="{{ asset('customer/js/jquery.meanmenu.min.js') }}"></script>
    <!-- Wow.min js -->
    <script src="{{ asset('customer/js/wow.min.js') }}"></script>
    <!-- Slick Carousel js -->
    <script src="{{ asset('customer/js/slick.min.js') }}"></script>
    <!-- Owl Carousel-2 js -->
    <script src="{{ asset('customer/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific popup js -->
    <script src="{{ asset('customer/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope js -->
    <script src="{{ asset('customer/js/isotope.pkgd.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('customer/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Mixitup js -->
    <script src="{{ asset('customer/js/jquery.mixitup.min.js') }}"></script>
    <!-- Countdown -->
    <script src="{{ asset('customer/js/jquery.countdown.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('customer/js/jquery.counterup.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('customer/js/waypoints.min.js') }}"></script>
    <!-- Barrating -->
    <script src="{{ asset('customer/js/jquery.barrating.min.js') }}"></script>
    <!-- Jquery-ui -->
    <script src="{{ asset('customer/js/jquery-ui.min.js') }}"></script>
    <!-- Venobox -->
    <script src="{{ asset('customer/js/venobox.min.js') }}"></script>
    <!-- Nice Select js -->
    <script src="{{ asset('customer/js/jquery.nice-select.min.js') }}"></script>
    <!-- ScrollUp js -->
    <script src="{{ asset('customer/js/scrollUp.min.js') }}"></script>
    <!-- Main/Activator js -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
</body>

<!-- index-331:41-->

</html>
