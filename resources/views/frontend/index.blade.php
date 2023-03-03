@include('frontend.partials.head')
<div class="main-sec ">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
@include('frontend.partials.heaader')
        <!--/banner-->
        <div class="banner-wthree-info container">
            <div class="row">
                <div class="col-lg-5 banner-left-info">
                    <h3>Redefining technologies <span>with kaicho group</span></h3>
                    <a href="{{route('products')}}" class="btn shop">Shop Now</a>
                </div>


                <div class="col-lg-7 banner-img">
                    <img src="{{asset('images/bag.png')}}" alt="part image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- //banner-->
<br>
    <!--/banner-bottom -->
    <section class="collections col-md-11 center">
        <div class="container-fluid col-md-11">
            <div class="row ">
                <div class="col-md-6 ab-content-img">

                </div>
                <div class="col-md-6 ab-content text-center p-lg-5 p-3 my-lg-5">
                    <h4>Send your Design</h4>
                    <p>Customers can take advantage of this service by creating their own unique 3D designs and having them printed without the need to own a 3D printer themselves.</p>
                    <a href="{{route('services')}}" class="btn shop mt-3">Upload your Design</a>

                </div>
            </div>
        </div>
    </section>
    <!-- /banner-bottom -->

    <section class="banner-bottom py-5">
        <div class="container py-5">

     <!--/row-->
     <div class="row shop-wthree-info text-center">


          <div class="row shop-wthree-info text-center">

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



    </div>


 @include('frontend.partials.footer')

</body>


<!-- Mirrored from demo.w3layouts.com/demos_new/template_demo/29-05-2019/baggage_demo_Free/379113341/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 10:36:59 GMT -->
</html>
