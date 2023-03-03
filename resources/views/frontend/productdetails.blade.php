@include('frontend.partials.head')
<div class="main-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
@include('frontend.partials.heaader')
</div>


<form action="{{route('addtocart')}}" method="post">
    @csrf
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <!---728x90--->

            <!-- product right -->
            <div class="left-ads-display wthree">
                <div class="row">
                    <div class="desc1-left col-md-6">
                        <img src="{{ asset('storage/products/'.$product->slug.'/thumbs/thumb_'.$product->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="desc1-right col-md-6 pl-lg-3">
                        <h3>{{$product->title}}</h3>
                        <div class="share-desc mt-5">
                            <div class="share text-left">

                                <h4>Product Category</h4>
                                <div class="social-ficons mt-4">
                                    <ul>

                                    @foreach ($product->categories as $category)
                                        <li><a style="background:#bfbfbfbf; padding: 2px 8px 3px 8px; border-radius:10px;"> {{$category->category->title}}</a></li>
                                        <li><a style="background:#bfbfbfbf; padding: 2px 8px 3px 8px; border-radius:10px;"> {{$category->category->subtitle}}</a></li>
                                    @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <h5>$ {{$product->price - $product->discounted_price}} &nbsp;  &nbsp;  &nbsp; <span> $ {{$product->price}}  </span></h5>
                        <div class="available mt-3">
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                <div class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                  <i class="fas fa-minus"></i>
                                </div>

                                <input id="form1" min="1" name="quantity" value="1" type="number"
                                  class="form-control-sm" style="color:black; width:50px;"/>

                                <div class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                  <i class="fas fa-plus"></i>
                                </div>

                              </div>
                              <br>
                              <div>
                                 <input type="hidden" name="id" value="{{$product->id}}">
                                <button type="submit" class="btn btn-primary"> &nbsp;Add to Cart &nbsp; &nbsp; &nbsp;  <i class="fas fa-shopping-cart"></i></button>
                              </div>
                            </form>


                        </div>
                        <div class="share-desc mt-5">
                            <div class="share text-left">

                                <h4>Product Tags</h4>
                                <div class="social-ficons mt-4">
                                    <ul>
                                        @php
                                        $tags = explode(",", $product->tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <li><a style="background:#bfbfbfbf; padding: 2px 8px 3px 8px; border-radius:10px;"> {{$tag}}</a></li>
                                    @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
                <div class="row sub-para-w3pvt my-5">

                    <h3 class="shop-sing">{{$product->title}}</h3>
                    {!! $product->long_description !!}



                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 ">
                    <div class="row ">
                        <?php
                            $images = Storage::files('public/products/'.$product->slug.'/');
                        ?>
                        @for ($i = 0; $i < count($images); $i++)
                            @if(strpos($images[$i], $product->image) != true)
                            <div class="col-md-3" id="gallery_image_{{$i}}">


                                <a data-fancybox="{{ $product->title }}" href="{{ asset('storage/products/'.$product->slug.'/'.basename($images[$i])) }}" data-sub-html="{{ $product->title }}">

                                    <img class="col-md-12" src="{{ asset('storage/').str_replace('public/products/'.$product->slug.'/','/products/'.$product->slug.'/',$images[$i])}}" alt="no-image" style=" padding: 4px;">
                                </a>
                            </div>
                            @endif
                        @endfor
                    </div>
                </div>


                <!--/row-->
                <h3 class="title-wthree-single my-lg-5 my-4 text-left">Product May you like</h3>
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
                <!--//row-->
            </div>
        </div>
    </section>
    <!-- /banner-bottom -->



    <!--//shipping-->
@include('frontend.partials.footer')
</body>


<!-- Mirrored from demo.w3layouts.com/demos_new/template_demo/29-05-2019/baggage_demo_Free/379113341/web/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 10:37:12 GMT -->
</html>
