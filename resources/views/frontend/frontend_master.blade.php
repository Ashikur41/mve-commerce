<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<!-- Mirrored from nest-frontend.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:57:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
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
    <script src="{{ url('Frontend/assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // Start product view with Modal

        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);
                    $('#pvendor_id').text(data.product.vendor_id);

                    $('#product_id').val(id);
                    $('#qty').val(1);


                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    }

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    }

                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            '</option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }

                    })

                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            '</option>')
                        if (data.color == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }

                    })
                }
            })
        }

        // Start add to Cart

        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var vendor = $('#pvendor_id').text();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor: vendor
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();

                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

        // Start add to Cart Details

        function addToCartDetails() {
            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var vendor = $('#vproduct_id').val();
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor: vendor
                },
                url: "/dCart/data/store/" + id,
                success: function(data) {
                    miniCart();

                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }
    </script>

    <script>
        jQuery(document).ready(function(id) {
            $('select[name="dsize"]').on('change', function() {
                var level = $(this).val();
                console.log(level);
                if (level) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('product/size') }}",
                        data: {
                            level: level
                        },
                        success: function(htmlresponse) {
                            // console.log(htmlresponse[0].selling_price);
                            $('#selling_price').html(htmlresponse[0].selling_price);
                            // alert(htmlresponse);
                        },
                        error: function(e) {
                            // alert("error");
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    $('#cartQty').text(response.cartQty);
                    $('span[id="cartSubTotal"]').text(response.cartTotal);

                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += ` <ul>
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

        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/miniCart/product/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }
    </script>
    {{-- start wishlist add --}}
    <script>
        function addToWishlist(product_id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/add-to-wishlist/' + product_id,
                success: function(data) {
                    Wishlist();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: "success",
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: "error",
                            title: data.error,
                        })
                    }
                }
            })
        }
        // {{-- end wishlist add --}}

        // start load wishlist data
        function Wishlist() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/get-wishlist-product/',
                success: function(response) {

                    $('#wishQty').text(response.wishQty);

                    var rows = ""

                    $.each(response.wishlist, function(key, value) {
                        rows += `
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
                                    ?`<h3 class="text-brand">&#2547;${value.product.selling_price}</h3>`
                                    :`<h3 class="text-brand">&#2547;${value.product.discount_price}</h3>`
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
        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/wishlist-remove/' + id,
                success: function(data) {
                    Wishlist();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: "success",
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: "error",
                            title: data.error,
                        })
                    }
                }
            })
        }

        // wishlist Remove end
    </script>

    <script>
        function Cart() {
            $.ajax({
                type: 'GET',
                url: '/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr class="pt-30">
                                <td class="custome-checkbox pl-30">

                                </td>
                                <td class="image product-thumbnail pt-40"><img src="/${value.options.image}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class='product-name mb-10 text-heading' href='#'>${value.name}</a></h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">$${value.price}</h4>
                                </td>

                                <td class="price" data-title="Price">
                                    ${value.options.color == null
                                        ?`<span>....</span>`
                                        :`<h6 class="text-body">${value.options.color} </h6>`
                                    }

                                </td>
                                <td class="price" data-title="Price">
                                    ${value.options.size == null
                                        ?`<span>....</span>`
                                        :`<h6 class="text-body">${value.options.size} </h6>`
                                    }
                                </td>

                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a type="submit" class="qty-down" id="${value.rowId}" onclick="CartDecrement(this.id)"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="quantity" id="dqty" class="qty-val" value="${value.qty}" min="1">
                                            <a type="submit" class="qty-up" id="${value.rowId}" onclick="CartIncrement(this.id)"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">&#2547;${value.subtotal} </h4>
                                </td>
                                <td class="action text-center" data-title="Remove"><a type="submit" class="text-body" id="${value.rowId}" onclick="CartRemove(this.id)"><i class="fi-rs-trash"></i></a></td>
                            </tr> `
                    });
                    $('#cartPage').html(rows);
                }
            })
        }
        Cart();

        // Remove Cart Start
        function CartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/cart/remove/' + id,
                dataType: 'json',
                success: function(data) {

                    miniCart();
                    Cart();
                    couponCalculation();

                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

        // Remove Cart End

        // Cart Decrement start
        function CartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/decrement/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    Cart();
                    couponCalculation();
                }
            })
        }
        // Cart Decrement end

        // Cart Increment start
        function CartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/increment/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    Cart();
                    couponCalculation();
                }
            })
        }
        // Cart Increment end
    </script>

    {{-- apply coupon start --}}
    <script>
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: '/coupon-apply',

                success: function(data) {
                    couponCalculation();

                    if (data.validity == true) {
                        $('#couponField').hide();
                    }
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

        // Start Coupon Calculation Method

        function couponCalculation() {
            $.ajax({
                type: "GET",
                url: "/coupon-calculation",
                dataType: "json",
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            `           <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Subtotal</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">&#2547;${data.total}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Grand Total</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">&#2547;${data.total}</h4>
                                            </td>
                                        </tr>
                            `
                        )


                    } else {
                        $('#couponCalField').html(
                            `           <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Subtotal</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">&#2547;${data.subtotal}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Coupon</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h6  class="text-brand text-end"> ${data.coupon_name}
                                                    <a type="submit" onclick="couponRemove()"><i class="fi-rs-trash"></i></a></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Discount Amount</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">&#2547;${data.discount_amount}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Grand Total</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">&#2547;${data.total_amount}</h4>
                                            </td>
                                        </tr>
                            `
                        )
                    }


                }
            })
        }
        couponCalculation();
        // end Coupon Calculation Method

        //  Remove Start
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: '/coupon/remove',
                dataType: 'json',
                success: function(data) {

                    couponCalculation();
                    $('#couponField').show();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }
    </script>
    {{-- apply coupon end --}}

</body>


<!-- Mirrored from nest-frontend.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 14:59:16 GMT -->

</html>
