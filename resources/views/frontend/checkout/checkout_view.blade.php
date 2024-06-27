@extends('frontend.frontend_master')

@section('content')

@section('title')
    Checkout Page
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    {{-- <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6> --}}
                </div>
            </div>
        </div>

        @php
            $id = Auth::user()?->id;
            $userData = App\Models\User::find($id);
        @endphp

        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                </div>
                @auth
                    <div class="row">
                        <h4 class="mb-30">Billing Details</h4>
                        <form id="myForm" method="post" action="{{ route('checkout.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input type="text" required="" name="shipping_name"
                                        value="{{ $userData->username }}">
                                </div>

                                <div class="form-group col-lg-12">
                                    <input type="text" name="shipping_phone" value="{{ $userData->phone }}">
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="email" required="" name="shipping_email"
                                        value="{{ $userData->email }}">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-12">
                                    <input required="" type="text" name="shipping_address"
                                        value="{{ $userData->address }}">
                                </div>

                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option"
                                            value="stripe" id="exampleRadios3">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                            data-target="#bankTranfer" aria-controls="bankTranfer">Insite Dhaka</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option"
                                            value="card" id="exampleRadios5">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                            data-target="#paypal" aria-controls="paypal">Out Site Dhaka</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Additional information" name="notes"></textarea>
                            </div>
                    </div>
                @else
                    <div class="row">
                        <h4 class="mb-30">Billing Details</h4>
                        <form id="myForm" method="post" action="{{ route('checkout.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input type="text" required="" name="shipping_name" placeholder="Your Name">
                                </div>

                                <div class="form-group col-lg-12">
                                    <input type="text" name="shipping_phone" placeholder="Your Phone Number">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-12">
                                    <input required="" type="text" name="shipping_address" placeholder="Address *">
                                </div>

                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option"
                                            value="stripe" id="exampleRadios3">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                            data-target="#bankTranfer" aria-controls="bankTranfer">Insite Dhaka</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio"
                                            name="payment_option" value="card" id="exampleRadios5">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                            data-target="#paypal" aria-controls="paypal">Out Site Dhaka</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Additional information" name="notes"></textarea>
                            </div>
                    </div>
                @endauth
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>

                                @foreach ($carts as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="{{ asset($item->options->image) }}" alt="product_image"
                                                style="width: 50px;height:50px;"></td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a class='text-heading'
                                                    href='#'>{{ $item->name }}</a></h6></span>
                                            <div class="product-rate-cover">
                                                <strong>Color : {{ $item->options->color }} </strong>
                                                <strong>Size : {{ $item->options->size }} </strong>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">&#2547;{{ $item->price }}</h4>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <table class="table no-border">
                            <tbody>

                                @if (Session::has('coupon'))
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">&#2547;{{ $cartTotal }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Coupon Name</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand text-end">
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ({{ session()->get('coupon')['coupon_discount'] }}%)</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Coupon Discount</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">
                                                &#2547;{{ session()->get('coupon')['discount_amount'] }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Grand Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">
                                                &#2547;{{ session()->get('coupon')['total_amount'] }}</h4>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Grand Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">&#2547;{{ $cartTotal }}</h4>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio" style="display: none;">
                            <input class="form-check-input" required="" type="radio" name="payment_options"
                                value="stripe" id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                data-target="#bankTranfer" aria-controls="bankTranfer">Stripe</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_options"
                                value="cash" id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio" style="display: none;">
                            <input class="form-check-input" required="" type="radio" name="payment_options"
                                value="card" id="exampleRadios5" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">

                        <img class="mr-15" src="{{ asset('Frontend/assets/imgs/theme/icons/payment-paypal.svg') }}"
                            alt="">
                        <img class="mr-15" src="{{ asset('Frontend/assets/imgs/theme/icons/payment-visa.svg') }}"
                            alt="">
                        <img class="mr-15" src="{{ asset('Frontend/assets/imgs/theme/icons/payment-master.svg') }}"
                            alt="">
                        <img src="{{ asset('Frontend/assets/imgs/theme/icons/payment-zapper.svg') }}" alt="">
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                            class="fi-rs-sign-out ml-15"></i></button>

                </div>
            </div>
            </form>
        </div>
    </div>
</main>


{{-- form valiedtion  --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                payment_option: {
                    required: true,
                },
                shipping_phone: {
                    required: true,
                },
            },
            messages: {
                payment_option: {
                    required: 'Please Enter Location',
                },
                shipping_phone: {
                    required: 'Please Enter Phone Number',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


{{-- division and district related --}}
<script>
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });

    // district and state related

    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' +
                                value.id + '">' + value.state_name + '</option>'
                            );
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>


@endsection
