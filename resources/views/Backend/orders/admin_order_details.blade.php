@extends('admin.admin_dashboard')

@section('main-content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin Order Details</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Order Details</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <hr />


            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shipping Details</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <table class="table" style="background:#F4F6FA;font-weight: 600;">
                                <tr>
                                    <th>Shipping Name:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>

                                <tr>
                                    <th>Shipping Phone:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>

                                <tr>
                                    <th>Shipping Email:</th>
                                    <th>{{ $order->email }}</th>
                                </tr>

                                <tr>
                                    <th>Shipping Address:</th>
                                    <th>{{ $order->address }}</th>
                                </tr>

                                <tr>
                                    <th>Order Date :</th>
                                    <th>{{ $order->order_date }}</th>
                                </tr>

                            </table>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details
                            <span class="text-danger">Invoice : {{ $order->invoice_no }} </span>
                        </h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 600;">

                            <tr>
                                <th>Payment Type:</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>


                            <tr>
                                <th>Transx ID:</th>
                                <th>{{ $order->transaction_id }}</th>
                            </tr>

                            <tr>
                                <th>Invoice:</th>
                                <th class="text-danger">{{ $order->invoice_no }}</th>
                            </tr>

                            <tr>
                                <th>Order Amonut:</th>
                                <th>&#2547; {{ $order->amount }}</th>
                            </tr>

                            <tr>
                                <th>Order Status:</th>
                                <th><span class="badge bg-danger" style="font-size: 15px;">{{ $order->status }}</span></th>
                            </tr>


                            <tr>
                                <th> </th>

                                <th>
                                    @if ($order->status == 'pending')
                                        <a href="{{ route('pending-confirm', $order->id) }}"
                                            class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                    @elseif($order->status == 'confirm')
                                        {{-- <a href="" class="btn btn-block btn-success" >Processing Order</a> --}}
                                        <a href="{{ route('confirm-processing', $order->id) }}"
                                            class="btn btn-block btn-success" id="processing">Processing Order</a>
                                    @elseif($order->status == 'processing')
                                        {{-- <a href="" class="btn btn-block btn-success" >Delivered Order</a> --}}
                                        <a href="{{ route('processing-delivered', $order->id) }}"
                                            class="btn btn-block btn-success" id="delivered">Delivered Order</a>
                                    @endif

                                </th>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" style="font-weight: 600;">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-1">
                                                <label>Image </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Product Name </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Vendor Name </label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Product Code </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Color </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Size </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Quantity </label>
                                            </td>

                                            <td class="col-md-3">
                                                <label>Price </label>
                                            </td>

                                        </tr>


                                        @foreach ($orderItem as $item)
                                            <tr>
                                                <td class="col-md-1">
                                                    <label><img
                                                            src="{{ !empty($item->product->product_thumbnail) ? url('' . $item->product->product_thumbnail) : url('upload/no_image.jpg') }}"
                                                            alt="product Image" srcset=""
                                                            style="width: 70px; height:40px;"></label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label>{{ $item->product->product_name }}</label>
                                                </td>
                                                @if ($item->vendor_id == null)
                                                    <td class="col-md-2">
                                                        <label>Owner </label>
                                                    </td>
                                                @else
                                                    <td class="col-md-2">
                                                        <label>{{ $item->product->vendor->name }} </label>
                                                    </td>
                                                @endif

                                                <td class="col-md-2">
                                                    <label>{{ $item->product->product_code }} </label>
                                                </td>
                                                @if ($item->color == null)
                                                    <td class="col-md-1">
                                                        <label>.... </label>
                                                    </td>
                                                @else
                                                    <td class="col-md-1">
                                                        <label>{{ $item->color }} </label>
                                                    </td>
                                                @endif

                                                @if ($item->size == null)
                                                    <td class="col-md-1">
                                                        <label>.... </label>
                                                    </td>
                                                @else
                                                    <td class="col-md-1">
                                                        <label>{{ $item->size }} </label>
                                                    </td>
                                                @endif
                                                <td class="col-md-1">
                                                    <label>{{ $item->qty }} </label>
                                                </td>

                                                <td class="col-md-3">
                                                    <label>&#2547; {{ $item->price }} <br> Total = &#2547;
                                                        {{ $item->price * $item->qty }} </label>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
