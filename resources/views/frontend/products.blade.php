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

            <h3 class="title-wthree mb-lg-5 mb-4 text-center">
                @if($show=="allproduct")
                Shop Now
                @else
                {{$category}} items
                @endif
            </h3>
            <!---728x90--->

            <!--/row-->



            @if($show=="allproduct")
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
         if($i>=8){
             break;
         }
     @endphp


   @endif

     @endforeach





 </div>
</div>

     @endforeach


        @endif



<div class="row shop-wthree-info text-center">





@if($show=="bycategory")
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


@endif



    @include('frontend.partials.footer')

