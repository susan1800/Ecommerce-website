
@include('frontend.partials.head')

<style>
    @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}

.card-registration .select-arrow {
top: 13px;
}

.bg-grey {
background-color: #eae8e8;
}

@media (min-width: 992px) {
.card-registration-2 .bg-grey {
border-top-right-radius: 16px;
border-bottom-right-radius: 16px;
}
}

@media (max-width: 991px) {
.card-registration-2 .bg-grey {
border-bottom-left-radius: 16px;
border-bottom-right-radius: 16px;
}
}
.error{
    color:red;
    font-size: 12px;
    margin:0px;padding:0px;
}
    </style>

<div class="main-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">

    @include('frontend.partials.heaader')

</div>

<!-- //banner-->
<!--/banner-bottom -->
<section class="banner-bottom py-5">
    <div class="container py-md-5">
        <!---728x90--->

        <div class="row shop-wthree-info text-center">
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="col-lg-8" style="text-align: left">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    @error('phone')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    @error('address')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    </div>
              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-8">
                      <div class="p-5">


                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                          @php $total = 0 ; @endphp
                                @if(session('kaichocart'))
                                @php
                                $total = count(session()->get('kaichocart'));
                                @endphp
                                @endif
                          <h6 class="mb-0 text-muted">{{$total}} Items</h6>
                        </div>
                        <hr class="my-4">


                        @php
                              $totalcart = $total;
                          @endphp
                          @if(session('kaichocart'))
                            @php $total = 0 @endphp
                            @foreach($carts as $cart)


                                @php

                                $total += $cart['total_price'] ;
                                $product = \App\Models\Product::find($cart['id']);

                                @endphp


                        <div class="row mb-4 d-flex justify-content-between align-items-center">

                          <div class="col-md-2 col-lg-2 col-xl-2">
                            <a href="{{route('shop.details' , $product->id)}}">
                            <img
                              src="{{ asset('storage/products/'.$product->slug.'/thumbs/thumb_'.$product->image) }}"
                              class="img-fluid rounded-3" alt="Cotton T-shirt">
                            </a>
                          </div>
                          <div class="col-md-3 col-lg-3 col-xl-3" style="padding:8px;">
                            <a href="{{route('shop.details' , $product->id)}}">
                            <h6 class="text-black mb-0">{{$product->title}}</h6>
                            <h6 class="text-muted" >
                                @foreach ($product->categories as $category)
                                {{$category->category->title}} &nbsp;  &nbsp;
                                @endforeach
                            </h6>
                        </a>

                          </div>

                          <div class="col-md-2 col-lg-2 col-xl-2 d-flex" style="padding:4px;">


                            <input id="form1" min="0" name="quantity" value="{{$cart['quantity']}}" type="text"
                              class="form-control form-control-sm" readonly style="width: 50px;"/>


                          </div>


                          <div class="col-md-5 col-lg-2 col-xl-2 offset-lg-1" style="padding:5px;">
                            @php
                                $price = $product->price - $product->discounted_price
                            @endphp
                            <h6 class="mb-0">Rs {{$price}} * {{$cart['quantity']}} =
                            </h6>
                            <h6 class="mb-0">Rs {{$price * $cart['quantity']}}
                                </h6>
                          </div>
                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <a href="{{route('removecart', $product->id)}}" class="text-muted"><i class="fas fa-times"></i></a>
                          </div>
                        </div>

                        <hr class="my-4">
                        @endforeach
                        @else
                        @php
                            $total = 0;
                        @endphp
                        @endif




                      </div>
                    </div>
                    <div class="col-lg-4 bg-grey">
                      <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-4">
                          <h5 class="text-uppercase">Cart items</h5>

                          <h5> {{$totalcart}}</h5>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-5">
                          <h5 class="text-uppercase">Sub Total</h5>
                          <h5>Rs {{$total}}</h5>
                        </div>
                        <div class="d-flex justify-content-between mb-5">
                            <h5 class="text-uppercase">Total Price</h5>
                            <h5>Rs {{$total}}</h5>
                          </div>

                        <button type="button" class="btn btn-dark btn-block btn-lg"
                          data-mdb-ripple-color="dark" data-toggle="modal" data-target="#exampleModal">Checkout</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fill the form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('checkout')}}" method="post">
                @csrf
              <div class="form-group">
                <label for="recipient-name" class="col-form-label " style="float:left">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{old('name')}}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="float:left">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" value="{{old('email')}}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="float:left">Mobile Number:</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Mobile number" value="{{old('phone')}}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label" style="float:left">Delivery Address:</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Eg:(lalitpur-14 nakhiport micro station)" value="{{old('address')}}" required>
              </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Checkout</button>
          </div>
        </form>

      </div>
    </div>
  </div>


      @include('frontend.partials.footer')
