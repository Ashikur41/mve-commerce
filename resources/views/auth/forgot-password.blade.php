<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from nest-frontend.netlify.app/page-reset-password by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 15:00:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Password Reset - Triad eCommerce Online Shop</title>
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
</head>

<body>
    @include('frontend.body.header')
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href=' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                        <div class="row">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="{{ url('Frontend') }}/assets/imgs/page/reset_password.svg" alt="" />
                                <h2 class="mb-15 mt-15">Email Password Reset</h2>
                                <p class="mb-30">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" required="" id="email" name="email" placeholder="Email *" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Email Password Reset Link</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</body>


<!-- Mirrored from nest-frontend.netlify.app/page-reset-password by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 15:00:56 GMT -->
</html>
