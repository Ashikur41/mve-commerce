<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from nest-frontend.netlify.app/page-account by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:59:38 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>User Dashboard - Triad eCommerce Online Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('Frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('Frontend') }}/assets/css/main2cc5.css?v=5.6" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body>
    @include('frontend.body.header')
    <!--End header-->
    <main class="main pages">
        @yield('user')
    </main>
    @include('frontend.body.footer')
    <!-- Preloader Start -->
    @include('frontend.body.preloader')
    <!-- Vendor JS-->
    <script src="{{ url('Frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/slick.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/waypoints.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/wow.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/magnific-popup.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/select2.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/counterup.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/images-loaded.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/isotope.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/scrollup.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{ url('Frontend') }}/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="{{ url('Frontend') }}/assets/js/main2cc5.js?v=5.6"></script>
    <script src="{{ url('Frontend') }}/assets/js/shop2cc5.js?v=5.6"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
    </script>
</body>


<!-- Mirrored from nest-frontend.netlify.app/page-account by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:59:39 GMT -->
</html>
