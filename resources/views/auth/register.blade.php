<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from nest-frontend.netlify.app/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 15:00:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Register - Triad eCommerce Online Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                    <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a
                                                    href='{{ route('login') }}'>Login</a></p>
                                        </div>

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" id="name" name="name"
                                                    placeholder="name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" required="" id="email" name="email"
                                                    placeholder="Email" />
                                            </div>
                                            <p id="result"></p>
                                            <div class="form-group">
                                                <input required="" type="password" name="password"
                                                    placeholder="Password" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" id="password_confirmation"
                                                    name="password_confirmation" placeholder="Confirm password" />
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                                            id="exampleCheckbox12" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I
                                                                agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                                <a href='page-privacy-policy.html'><i
                                                        class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit"
                                                    class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                                    name="login">Submit &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will
                                                be used to support your experience throughout this website, to manage
                                                access to your account, and for other purposes described in our privacy
                                                policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login google-login">
                                        <img src="{{ url('Frontend') }}/assets/imgs/theme/icons/logo-google.svg"
                                            alt="" />
                                        <span>Continue with Google</span>
                                    </a>
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
    {{--
    <script>
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

        const validate = () => {
            const $result = $('#result');
            const email = $('#email').val();
            $result.text('');

            if (validateEmail(email)) {
                $result.text(email + ' is valid.');
                $result.css('color', 'green');
            } else {
                $result.text(email + ' is invalid.');
                $result.css('color', 'red');
            }
            return false;
        }

        $('#email').on('input', validate);
    </script> --}}
</body>


<!-- Mirrored from nest-frontend.netlify.app/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 15:00:55 GMT -->

</html>
