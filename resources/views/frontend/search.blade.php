@include('frontend.partials.head')
<div class="main-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
@include('frontend.partials.heaader')
</div>

    <!-- //banner-->
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <!---728x90--->

            <h2 class=" mb-lg-5 mb-4 text-center">Search for "{{$search}}"</h2>
            <!---728x90--->

            <!--/row-->
            <div class="row shop-wthree-info text-center">
            @if(!count($products))
            <p class="center">
               <b>  !!! RESULT NOT FOUND !!!</b>
            </p>
            @endif

                @foreach ($products as $product)


                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="product-shoe-info shoe">
                        <a href="{{route('shop.details',$product->id)}}">
                        <div class="men-thumb-item">
                            <img src="{{ asset('storage/products/'.$product->slug.'/thumbs/thumb_'.$product->image) }}" class="img-fluid" alt="">

                        </div>
                        </a>
                        <a href="{{route('shop.details',$product->id)}}">
                        <div class="item-info-product">
                            <h4>
                                <a href="{{route('shop.details',$product->id)}}">{{$product->title}} </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money"><span class="line">${{$product->price}}</span> ${{$product->price - $product->discounted_price}}</span>
                                </div>
                                <br>
                                <a href="{{route('shop.details',$product->id)}}">
                                <p class=" btn-success" style="border-radius:10px; padding-buttom:0px; padding-top:0px; padding-left:5px; padding:right:5px;">Saved  &nbsp;  &nbsp; $ {{$product->discounted_price }}</p>
                                </a>

                            </div>

                        </div>
                        </a>
                    </div>
                </div>

                @endforeach



    <!--//shipping-->
    @include('frontend.partials.footer')
</body>


<!-- Mirrored from demo.w3layouts.com/demos_new/template_demo/29-05-2019/baggage_demo_Free/379113341/web/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 10:37:16 GMT -->
</html>
