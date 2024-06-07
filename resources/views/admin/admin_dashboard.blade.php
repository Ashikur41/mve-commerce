<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/rukada/demo/vertical/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 22:33:26 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('Admin/assets/images/favicon-32x32.png') }}" type="image/png" />
    <link href="{{ asset('Admin/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ asset('Admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('Admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('Admin/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/header-colors.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ asset('Admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>

    @yield('style-lib')
    @stack('custom-css')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.body.header')
        <!--end header -->
        <!--start page wrapper -->
        @yield('main-content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.body.footer')
    </div>
    <!--end wrapper-->


    <!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-list">
                        <p class="mb-1">Html Templates</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Web Designe Company</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Software Development</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Online Shoping Portals</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search modal -->




    <!--start switcher-->
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('Admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('Admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/chartjs/js/chart.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
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

    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <script src="{{ asset('Admin') }}/assets/js/index.js"></script>
    <!--app JS-->
    <script src="{{ asset('Admin') }}/assets/js/app.js"></script>
    <script src="{{ asset('Admin') }}/assets/js/validate.min.js"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('Admin/assets/js/code.js') }}"></script>


    @yield('script-lib')
    @stack('custom-js')
</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 22:34:02 GMT -->

</html>
