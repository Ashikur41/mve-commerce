@extends('frontend.frontend_master')

@section('content')

@section('title')
    Cash Payment
@endsection

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href='#' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Cash On Delivery Payment
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        {{-- <div class="row">
            <div class="col-lg-8 mb-40">
                <h4 class="heading-2 mb-10">Cash On Delivery</h4>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row mb-50">
                    <div class="border p-40 cart-totals ml-30 mb-50">

                        <!-- Congratulations area starts -->
                        <div class="congratulation-area text-center mt-5">
                            <div class="container">
                                <div class="congratulation-wrapper">
                                    <div class="congratulation-contents center-text">
                                        <div class="congratulation-contents-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <h4 class="congratulation-contents-title"> Thanks for your order </h4>
                                        <div class="divider-2 mb-30"></div>
                                        <div class="table-responsive order_table checkout">
                                            <table class="table no-border">
                                                <tbody>
                                                    @if (Session::has('coupon'))
                                                        <tr>
                                                            <td class="cart_total_label">
                                                                <h6 class="text-muted">Subtotal</h6>
                                                            </td>
                                                            <td class="cart_total_amount">
                                                                <h4 class="text-brand text-end">
                                                                    &#2547;{{ $cartTotal }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">
                                                                <h6 class="text-muted">Coupon Name</h6>
                                                            </td>
                                                            <td class="cart_total_amount">
                                                                <h6 class="text-brand text-end">
                                                                    {{ session()->get('coupon')['coupon_name'] }}
                                                                    ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                                </h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">
                                                                <h6 class="text-muted">Coupon Discount</h6>
                                                            </td>
                                                            <td class="cart_total_amount">
                                                                <h4 class="text-brand text-end">
                                                                    &#2547;{{ session()->get('coupon')['discount_amount'] }}
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">
                                                                <h6 class="text-muted">Grand Total</h6>
                                                            </td>
                                                            <td class="cart_total_amount">
                                                                <h4 class="text-brand text-end">
                                                                    &#2547;{{ session()->get('coupon')['total_amount'] }}
                                                                </h4>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td class="cart_total_label">
                                                                <h6 class="text-muted">Grand Total</h6>
                                                            </td>
                                                            <td class="cart_total_amount">
                                                                <h4 class="text-brand text-center">
                                                                    &#2547;{{ $cartTotal }}</h4>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="btn-wrapper mt-4">
                                            <form action="{{ route('cash.order') }}" method="post">
                                                @csrf

                                                @auth
                                                    <div class="form-row">
                                                        <label for="card-element">
                                                            <input type="hidden" name="name"
                                                                value="{{ $data['shipping_name'] }}">
                                                            <input type="hidden" name="email"
                                                                value="{{ $data['shipping_email'] }}">
                                                            <input type="hidden" name="phone"
                                                                value="{{ $data['shipping_phone'] }}">
                                                            {{-- <input type="hidden" name="post_code" value="{{ $data['post_code'] }}"> --}}
                                                            {{-- <input type="hidden" name="division_id" value="{{ $data['division_id'] }}"> --}}
                                                            {{-- <input type="hidden" name="district_id" value="{{ $data['district_id'] }}"> --}}
                                                            {{-- <input type="hidden" name="state_id" value="{{ $data['state_id'] }}"> --}}
                                                            <input type="hidden" name="address"
                                                                value="{{ $data['shipping_address'] }}">
                                                            <input type="hidden" name="notes"
                                                                value="{{ $data['notes'] }}">
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <label for="card-element">
                                                            <input type="hidden" name="name"
                                                                value="{{ $data['shipping_name'] }}">
                                                            {{-- <input type="hidden" name="email" value="{{ $data['shipping_email'] }}"> --}}
                                                            <input type="hidden" name="phone"
                                                                value="{{ $data['shipping_phone'] }}">
                                                            {{-- <input type="hidden" name="post_code" value="{{ $data['post_code'] }}"> --}}
                                                            {{-- <input type="hidden" name="division_id" value="{{ $data['division_id'] }}"> --}}
                                                            {{-- <input type="hidden" name="district_id" value="{{ $data['district_id'] }}"> --}}
                                                            {{-- <input type="hidden" name="state_id" value="{{ $data['state_id'] }}"> --}}
                                                            <input type="hidden" name="address"
                                                                value="{{ $data['shipping_address'] }}">
                                                            <input type="hidden" name="notes"
                                                                value="{{ $data['notes'] }}">
                                                        </label>
                                                    </div>
                                                @endauth

                                                <br>
                                                <button class="btn btn-primary">Submit Order</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Congratulations area end -->

                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</main>


@endsection
