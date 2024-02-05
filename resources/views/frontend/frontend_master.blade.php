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
    <script src="{{ url('Frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ url('Frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ url('Frontend/assets/js/main2cc5.js?v=5.6') }}"></script>
    <script src="{{ url('Frontend/assets/js/shop2cc5.js?v=5.6') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
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


                    $('#product_id').val(id);
                    $('#qty').val(1);


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

        // Start add to Cart

        function addToCart(){
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();

            $.ajax({
                type:"POST",
                dataType:'json',
                data:{
                    color:color,size:size,quantity:quantity,product_name:product_name
                },
                url:"/cart/data/store/"+id,
                success:function(data){
                    miniCart();
                    $('#closeModal').click();

                    // Start Message

                    const Toast = Swal.mixin({
                        toast:true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            title:data.success,
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            title:data.error,
                        })
                    }
                }
            })
        }

        // Start add to Cart Details

            function addToCartDetails(){
            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();

            $.ajax({
                type:"POST",
                dataType:'json',
                data:{
                    color:color,size:size,quantity:quantity,product_name:product_name
                },
                url:"/dCart/data/store/"+id,
                success:function(data){
                    miniCart();

                    // Start Message

                    const Toast = Swal.mixin({
                        toast:true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            title:data.success,
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            title:data.error,
                        })
                    }
                }
            })
        }

    </script>

    <script>
        function miniCart(){
            $.ajax({
                type:'GET',
                url:'/product/mini/cart',
                dataType:'json',
                success:function(response){
                    // console.log(response)

                    $('#cartQty').text(response.cartQty);
                    $('span[id="cartSubTotal"]').text(response.cartTotal);

                    var miniCart = ""
                    $.each(response.carts,function(key,value){
                        miniCart +=` <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href='#'><img alt="Nest" src="/${value.options.image}" style="width:50px;height:50px;" /></a>
                                            </div>
                                            <div class="shopping-cart-title" style="margin: -73px 74px 14px;width"146px>
                                                <h4><a href='#'>${value.name}</a></h4>
                                                <h4><span>${value.qty} × </span>${value.price}</h4>
                                            </div>
                                            <div class="shopping-cart-delete" style="margin: -5px; 1px; 0px;">
                                                <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr><br>
                                `
                    });
                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();

        // MiniCart Remove

        function miniCartRemove(rowId){
            $.ajax({
                type:'GET',
                url:'/miniCart/product/remove/'+rowId,
                dataType:'json',
                success:function(data){
                    miniCart();
                     // Start Message

                     const Toast = Swal.mixin({
                        toast:true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            title:data.success,
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            title:data.error,
                        })
                    }
                }
            })
        }

    </script>
    {{-- start wishlist add --}}
    <script>
        function addToWishlist(product_id){
            $.ajax({
                type:'POST',
                dataType:'json',
                url:'/add-to-wishlist/'+product_id,
                success:function(data){
                    Wishlist();
                        // Start Message

                        const Toast = Swal.mixin({
                        toast:true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            icon: "success",
                            title:data.success,
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            icon: "error",
                            title:data.error,
                        })
                    }
                }
            })
        }
        // {{-- end wishlist add --}}

        // start load wishlist data
        function Wishlist(){
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'/get-wishlist-product/',
                success:function(response){

                    $('#wishQty').text(response.wishQty);

                    var rows = ""

                    $.each(response.wishlist,function(key,value){
                        rows +=`
                        <tr class="pt-30">
                                <td class="custome-checkbox pl-30">

                                </td>
                                <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thumbnail}" alt="product_thumbnail" /></td>
                                <td class="product-des product-name">
                                    <h6><a class='product-name mb-10' href='#'>${value.product.product_name}</a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    ${value.product.discount_price == null
                                    ?`<h3 class="text-brand">$${value.product.selling_price}</h3>`
                                    :`<h3 class="text-brand">$${value.product.discount_price}</h3>`
                                    }

                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    ${value.product.product_qty > 0
                                        ?`<span class="stock-status in-stock mb-0"> In Stock </span>`

                                        :`<span class="stock-status out-stock mb-0"> Stock Out </span>`
                                    }

                                </td>

                                <td class="action text-center" data-title="Remove">
                                    <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                        `
                    });

                    $('#wishlist').html(rows);

                }
            })
        }
        Wishlist();

        // wishlist Remove Start
        function wishlistRemove(id){
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'/wishlist-remove/'+id,
                success:function(data){
                    Wishlist();
                        // Start Message

                        const Toast = Swal.mixin({
                        toast:true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            icon: "success",
                            title:data.success,
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            icon: "error",
                            title:data.error,
                        })
                    }
                }
            })
        }

        // wishlist Remove end
    </script>



</body>


<!-- Mirrored from nest-frontend.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:59:16 GMT -->
</html>
