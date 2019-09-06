<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer {{$order->id}}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/admin_style.css') }}" rel="stylesheet">
</head>
<body>
<div class="content-wrapper">
    <div class="invoice-header">
        <div class="float-right site-address">
            <h4>Laravel Ecommerce</h4>
            <p>31/1, Purana Paltan, Dhaka-1200</p>
            <p>Phone : <a href="">01700899084</a></p>
            <p>Email : <a href="mdsaifulislampyada@gmail.com">mdsaifulislampyada@gmail.com</a></p>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="invoice-information">
        <div class="float-left invoice-left-top">
            <h6>Invoice To</h6>
            <h3>{{$order->name}}</h3>
            <div class="address">
                <p>
                    <strong>Address : </strong>
                    {{$order->shipping_address}}
                </p>
                <p>Phone : {{$order->phone_no}}</p>
                <p>Email : {{$order->email}}</p>
            </div>
        </div>
        <div class="float-right invoice-right-top">
            <h3>Invoice #{{$order->id}}</h3>
            <p>{{$order->created_at}}</p>
        </div>
        <div class="clearfix"></div>
    </div>

    <h3>Products</h3>
    @if($order->carts->count() > 0)
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>No.</th>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Unit Price</th>
                <th>Sub total Price</th>
            </tr>
            </thead>
            <tbody>
            @php
                $total_price= 0;
            @endphp
            @foreach($order->carts as $cart)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>
                        <a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a>
                    </td>
                    <td>
                        <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
                            @csrf
                            <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                        </form>
                    </td>
                    <td>{{number_format($cart->product->price,2)}}</td>
                    @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                    @endphp
                    <td>{{number_format($cart->product->price * $cart->product_quantity,2)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td>Discount : </td>
                <td colspan="2">
                    <strong>{{number_format($order->custom_discount,2)}} Taka</strong>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Shipping Charge : </td>
                <td colspan="2">
                    <strong>{{number_format($order->shipping_charge,2)}} Taka</strong>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Total Amount : </td>
                <td colspan="2">
                    <strong>{{number_format($total_price + $order->shipping_charge,2)}} Taka</strong>
                </td>
            </tr>
            </tbody>
        </table>
    @endif
    <div class="thanks mt-3">
        <h4>Thank You for your business ! </h4>
    </div>

    <div class="authority float-right mt-5">
        <p>.................</p>
        <h5>Authority Signature</h5>
    </div>
    <div class="clearfix"></div>
</div>
</body>
</html>


