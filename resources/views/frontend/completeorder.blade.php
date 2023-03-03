@include('frontend.partials.head')
<div class="main-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
@include('frontend.partials.heaader')
</div>

    <section class="banner-bottom py-5">
        <div class="container py-md-5">

    <section class="shop-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sideber-side">
                </div>
    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
    <div class="post" >
        <table>
            <tr >
                <th style="padding:10px;">Sn</th>
                <th style="padding:10px;">Product_name</th>
                <th style="padding:10px;">quantity</th>
                <th style="padding:10px;">price</th>
                <th style="padding:10px;">Discounted price</th>
                <th style="padding:10px;">Total price</th>
            </tr>
            @php $i=1; @endphp

            @foreach($order->orderDetails as $product)
            <tr>
                <th style="padding:10px;">{{$i}}</th>
                <th style="padding:10px;">{{$product->product->title}}</th>
                <th style="padding:10px;">{{$product->quantity}}</th>
                <th style="padding:10px;">{{$product->product->price}}</th>
                <th style="padding:10px;">{{$product->product->price - $product->product->discounted_price}}</th>
                <th style="padding:10px;">{{$product->total_price}}</th>
            </tr>
            @endforeach

        </table>
        <br><br>
        <table>
            <tr>
                <th>Total Amount:  </th>
                <td style="width: 30px;">:</td>
                <td ></td>
                <td><b>{{$order->total_price}}</b></td>
            </tr>
            <tr>
                <th >&nbsp;</th>
            </tr>
            <tr>
                <th>Order number </th>
                <td>:</td>
                <td>{{$order->order_id}}</td>
            </tr>
            <tr>
                <th>Receiver name </th>
                <td>:</td>
                <td>{{$order->receiver_name}}</td>
            </tr>
            <tr>
                <th>Receiver Phone</th>
                <td>:</td>
                <td>{{$order->receiver_phone}}</td>
            </tr>
            <tr>
                <th> Email </th>
                <td>:</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <th> Delivery Address </th>
                <td>:</td>
                <td>{{$order->shipping_address}}</td>
            </tr>

        </table>


    </div>
    </div>



@include('frontend.partials.footer')


