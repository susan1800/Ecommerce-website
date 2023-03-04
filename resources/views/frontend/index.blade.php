@include('frontend.partials.head')

<style>
@media only screen and (min-width: 1024px) {
    .header_text {
      font-size: 60px !important;
    }
  }
  </style>
<div class="main-sec ">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
@include('frontend.partials.heaader')
        <!--/banner-->
        <div class="banner-wthree-info container">
            <div class="row">
                <div class="col-lg-5 banner-left-info">
                    <h3 class="header_text">Redefining technologies <span>with kaicho group</span></h3>
                    <a href="{{route('products')}}" class="btn shop">Shop Now</a>
                </div>


                <div class="col-lg-7 banner-img">

                    <video autoplay muted loop id="myVideo" class="col-lg-12">
                        <source src="{{asset('video/video.mp4')}}" type="video/mp4">
                        Your browser does not support HTML5 video.
                        </video>

                    {{-- <img src="{{asset('images/bag.png')}}" alt="part image" class="img-fluid"> --}}
                </div>

            </div>
        </div>
        <br><br><br>
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
                    <h4>CUSTOMISE YOUR DESIGN</h4>
                    <p>Give us your own design, we can get them printed.</p>
                    <a href="{{route('services')}}" class="btn shop mt-3">Upload your Design</a>

                </div>
            </div>
        </div>
    </section>
    <!-- /banner-bottom -->

    <section class="banner-bottom py-5">
        <div class="container py-5">


            @foreach ($product_categories as $category)

               <!--/row-->
     <div class="row shop-wthree-info text-center">


        <div class="row shop-wthree-info text-center">
            <div style="margin-top:50px;">
            <hr>

            <div style="display:flex; " class="col-lg-12">
                <div style=" margin-bottom:-5px; text-transform:capitalize; float:left; text-align:left" class="col-lg-8"><h3>{{$category->category->title}} items </h3></div>  <div style="float: right; text-align:right; font-size:15px;"  class="col-lg-4"><a href="{{route('shopby.category',$category->category_id)}}">View More >></a> </div>

            </div>
                 <hr>
            </div>



                @php
                    $i=0;
                @endphp
        @foreach ($products as $product)
        @if(($product->product->display == 1) && ($product->category_id == $category->category_id))

        <div class="col-lg-3 shop-info-grid text-center mt-4">
            <div class="product-shoe-info shoe">
                <a href="{{route('shop.details',$product->product->id)}}">
                <div class="men-thumb-item">
                    <img src="{{ asset('storage/products/'.$product->product->slug.'/thumbs/thumb_'.$product->image) }}" class="img-fluid" alt="">

                </div>
                </a>
                <a href="{{route('shop.details',$product->product->id)}}">
                <div class="item-info-product">
                    <h4>
                        <a href="{{route('shop.details',$product->product->id)}}">{{$product->product->title}} </a>
                    </h4>

                    <div class="product_price">
                        <div class="grid-price">
                            <span class="money"><span class="line">${{$product->price}}</span> ${{$product->price - $product->discounted_price}}</span>
                        </div>
                        <br>
                        <a href="{{route('shop.details',$product->product->id)}}">
                        <p class=" btn-success" style="border-radius:10px; padding-buttom:0px; padding-top:0px; padding-left:5px; padding:right:5px;">Saved  &nbsp;  &nbsp; $ {{$product->product->discounted_price }}</p>
                        </a>

                    </div>

                </div>
                </a>
            </div>
        </div>

        @php
            $i++;
            if($i>=4){
                break;
            }
        @endphp


      @endif

        @endforeach





    </div>
</div>

        @endforeach









 @include('frontend.partials.footer')

</body>


<!-- Mirrored from demo.w3layouts.com/demos_new/template_demo/29-05-2019/baggage_demo_Free/379113341/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 10:36:59 GMT -->
</html>
