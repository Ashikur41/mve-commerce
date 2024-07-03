<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">


    <style>
        @font-face {
        font-family: "kalpurush";
        font-style: normal;
        font-weight: normal;
        src: url(kalpurush.ttf) format('truetype');
    }
    * {
        font-family: "kalpurush";
    }

    </style>

    {{-- <style>
        @import url('https://fonts.maateen.me/kalpurush/font.css');
    </style> --}}



</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>azBazar</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
                azBazar Head Office
                Email:support@azBazar.com <br>
                Mob: 01608-159295 <br>
                Shawrapara,Eqbol Road,Mirpur Dhaka <br>

            </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;"></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Name:</strong> {{ $order->name }} <br>
                    <strong>Email:</strong> {{ $order->email }} <br>
                    <strong>Phone:</strong> {{ $order->phone }} <br>

                    <strong>Address:</strong> {{ $order->address }}<br>
                    <strong>Post Code:</strong> {{ $order->post_code }}
                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: green;">Invoice:</span> #{{ $order->invoice_no }}</h3>
                Order Date: {{ $order->order_date }} <br>
                Delivery Date: {{ $order->delivered_date }} <br>
                Payment Type : {{ $order->payment_method }} </span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Image</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Vendor</th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orderItem as $item)
                <tr class="font">
                    <td align="center">
                        <img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"
                            alt="">
                    </td>
                    <td align="center">{{ $item->product->product_name }}</td>

                    @if ($item->color == null)
                        <td align="center"> ...</td>
                    @else
                        <td align="center"> {{ $item->color }}</td>
                    @endif

                    @if ($item->size == null)
                        <td align="center"> ...</td>
                    @else
                        <td align="center"> {{ $item->size }}</td>
                    @endif
                    <td align="center">{{ $item->product->product_code }}</td>
                    <td align="center">{{ $item->qty }}</td>

                    @if ($item->vendor_id == null)
                        <td align="center">Owner</td>
                    @else
                        <td align="center">{{ $item->product->vendor->name }}</td>
                    @endif

                    <td align="center">&#2547; {{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Subtotal:</span>&#2547; {{ $order->amount }}</h2>
                <h2><span style="color: green;">Total:</span>&#2547; {{ $order->amount }}</h2>
                {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Thanks For Buying Products..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>
</body>

</html>
