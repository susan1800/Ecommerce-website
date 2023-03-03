@include('frontend.partials.head')
    <style>
        @media screen and (max-width: 1020px) {

    .text, .text p, .text a{
    font-size: 19px;
    }


    }
    </style>

<div class="main-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">

@include('frontend.partials.heaader')

</div>
<section class="banner-bottom py-5">
    <div class="container py-md-5">
@if(session('kaichocart'))
    @php
    $carts = session()->get('kaichocart');
    $total = 0 ;
    $randomString = Str::random(10);
    $ldate =  Carbon\Carbon::now();
    $order_id = $randomString.'-' . $ldate->toDateTimeString();
    session()->put('uaques_order_id', $order_id);


    @endphp
    @foreach($carts as $cart)
      @php $total += $cart['total_price'] @endphp
    @endforeach
@endif

 <style>
    .paymentWrap {
	padding: 50px;
}

.paymentWrap .paymentBtnGroup {
	max-width: 800px;
	margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
	padding: 40px;
    height: 250px;
	box-shadow: none;
	position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
	outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
	border-color: #4cd264;
	outline: none !important;
	box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
	position: absolute;
	right: 3px;
	top: 3px;
	bottom: 3px;
	left: 3px;
	background-size: contain;
	background-position: center;
	background-repeat: no-repeat;
	border: 2px solid transparent;
	transition: all 0.5s;
}

.cashondelivery{
    background-image: url("{{asset('images/cashondelivery.jpg')}}");
}

.qrscan{
    background-image: url("{{asset('images/qrcode.png')}}");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
	border-color: #4cd264;
	outline: none !important;
    display: flex;
}
 </style>

 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->
 <div class="headingWrap">
     <h3 class="headingTop text-center" style="text-align:center;">Select Your Payment Method</h3>
  </div>
 <div class="container">
     <div class="row">
         <div class="paymentCont">

                         <!-- <div class="sidebar-post sidebar-widget">

                            <div class="widget-content"> -->
                            @if(session('kaichocart'))
                            @php
                            $total = 0 ;

                            @endphp
                            <table  border="1" style="width: 100%">
                                <tr style="padding:10px;">
                                    <th></th>
                                    <th style="padding-top:10px;">Name</th>
                                    <th style="padding-top:10px;">quantity</th>
                                    <th style="padding-top:10px;">Price</th>
                                    <th style="padding-top:10px;">Subtotal </th>
                                </tr>
                            @foreach($carts as $cart)


                                @php $total += $cart['total_price'];
                                $product = \App\Models\Product::find($cart['id']); @endphp
                                <tr >
                                    <th>
                                    <figure class="image-box">
                                        <img src="{{ asset('storage/products/'.$product->slug.'/'.$product->image)}}" width="100" alt="">
                                    </figure>
                                    </th>
                                    <th>
                                        {{$cart['name']}}
                                    </th>
                                    <th>
                                        {{$cart['quantity']}}
                                    </th>
                                    <th>
                                        <div class="text">{{$cart['price']}}</div>
                                    </th>
                                    <th>
                                        <div class="text"> {{$cart['total_price']}}</div>
                                    </th>

                                </tr>

                                @endforeach
                                <tr>
                                    <th>&nbsp;</th>
                                </tr>

                                <tr>
                                    <th>&nbsp;</th>
                                </tr>

                                <tr style="border:1px solid black;">
                                    <th style="padding:10px;">Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="padding:10px;">RS:{{$total}} |-</th>
                                </tr>
                            </table>
                                <br><br>


                                <div class="sub-total clearfix">


                            @endif
                            </div>
                        </div>


                        <!-- define total amount here -->


                         <input type="hidden" id="totalamount" value="{{$total}}">





                         <div class="paymentWrap">
                            <div class="btn-group paymentBtnGroup btn-group-justified" >

                                <label  style="margin:20px">
                                    <div style="">
                                       <b> <p style="font-size:20px;"> Scan the QR code below and upload a screenshot here. Alternatively, you can choose to pay on delivery by clicking on the cash on delivery option. Thank you! </p>
                                       </b>
                                    </div>
                                    <form action="{{route('checkout.qrscan')}}" method="post" enctype='multipart/form-data'>
                                        @csrf
                                    <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" required>

                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Submit Your Order" >
                                    </form>
                                </label>

                            </div>
                        </div>



                         <div class="paymentWrap">
                             <div class="btn-group paymentBtnGroup btn-group-justified" >









                                 <label class="btn paymentMethod">
                                    <a href="{{route('checkout.cashondelivery')}}">
                                     <div class="method" style='background-image: url("{{asset('images/cashondelivery.jpg')}}")'></div>
                                     <input type="radio" name="options">
                                    </a>
                                 </label>



                                 <label class="btn" style="margin:20px">

                                    </label>


                                 <label class="btn paymentMethod" >
                                    <div class="method qrscan"></div>
                                    <input type="radio" name="options">
                                </label>



                             </div>
                         </div>



                     </div>



     </div>
 </div>

