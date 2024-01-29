<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from nest-frontend.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:57:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Triad Solution eCommerce</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('Frontend') }}/assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('Frontend') }}/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ url('Frontend') }}/assets/css/main2cc5.css?v=5.6" />
</head>

<body>
    <!-- Modal -->
    @include('frontend.body.modal')
    <!-- Quick view -->
    @include('frontend.body.quick_view')
    @include('frontend.body.header')
    <!--End header-->
    @yield('content')
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


    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('centent')
            }
        })

        // Start product view with Modal

        function productView(id){
            // alert(id)
            $.ajax({
                type:'GET',
                url:'/product/view/modal/'+id,
                dataType:'json',
                success:function(data){
                    // console.log(data)
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pimage').attr('src','/'+data.product.product_thumbnail);

                    if(data.product.discount_price == null){
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    }else{
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    }

                    if(data.product.product_qty > 0){
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');
                    }else{
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }

                    $('select[name="size"]').empty();
                    $.each(data.size,function(key,value){
                        $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')
                        if(data.size == ""){
                            $('#sizeArea').hide();
                        }else{
                            $('#sizeArea').show();
                        }

                    })

                    $('select[name="color"]').empty();
                    $.each(data.color,function(key,value){
                        $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
                        if(data.color == ""){
                            $('#colorArea').hide();
                        }else{
                            $('#colorArea').show();
                        }

                    })
                }
            })
        }

    </script>

</body>


<!-- Mirrored from nest-frontend.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:59:16 GMT -->
</html>
