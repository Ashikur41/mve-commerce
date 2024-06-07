@extends('frontend.frontend_master')

@section('style-lib')
@endsection

@push('custom-css')
    <style type="text/css">


    </style>
@endpush

@section('content')

@section('title')
    azBazar
@endsection
<main class="main">
    @include('frontend.home.home_slider')
    <!--End hero slider-->
    @include('frontend.home.popular_categories')
    <!--End category slider-->
    @include('frontend.home.home_banner')
    <!--End banners-->
    @include('frontend.home.home_product')
    <!--Products Tabs-->
    {{-- @include('frontend.home.daily_best_sells') --}}
    <!--End Best Sales-->
    @include('frontend.home.category_product')
    <!--End Best Sales-->
    {{-- @include('frontend.home.deals_of_the_day') --}}
    <!--End Deals-->
    @include('frontend.home.selling_four')
    <!--End 4 columns-->
</main>
@endsection

@section('script-lib')
@endsection


@push('custom-js')
<script>
    // Start add to Mobaie Cart Details

    function addCart(id) {
        // var id = $('.addproduct_id').val();
        // console.log(id);
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            url: "{{ url('cart/mobile/data/store') }}",
            // url:"/cart/mobile/data/store/",
            success: function(data) {
                console.log(data);
                mobailminiCart();
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


    // mobail mini cart

    function mobailminiCart() {
        $.ajax({
            type: 'GET',
            url: "{{ url('product/mobile/mini/cart') }}",
            // url:'/product/mobile/mini/cart',
            dataType: 'json',
            success: function(response) {
                // console.log(response)

                $('#cartQty').text(response.cartQty);
                $('span[id="cartSubTotal"]').text(response.cartTotal);

                var MobailMiniCart = ""
                $.each(response.carts, function(key, value) {
                    MobailMiniCart += `
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href='shop-product-right.html'><img alt="Nest" src="/${value.options.image}" style="width:50px;height:50px;" /></a>
                                        </div>
                                        <div class="shopping-cart-title" style="margin: -20px 74px 14px;width"146px>
                                            <h4><a href='#'>${value.name}</a></h4>
                                            <h3><span>${value.qty} × </span>${value.price}</h3>
                                        </div>
                                        <div class="shopping-cart-delete" style="margin: -20px; 1px; 0px;">
                                            <a type="submit" id="${value.rowId}" onclick="MobileminiCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                    <hr><br>
                                `
                });
                $('#MobailMiniCart').html(MobailMiniCart);
            }
        })
    }
    mobailminiCart();
</script>
@endpush
