@include('frontend.partials.head')


<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<style>

  .error{
    font-size: 12px;
    color:red;
  }

  .gradient-custom-2 {
/* fallback for old browsers */
background: #0bc2cf;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #2ce7f5, #0cdef5 #05f57d, #0cdef5);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #2ce7f5, #0cdef5 #05f57d, #0cdef5);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}


</style>

<div class="main-sec inner-page">
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">

@include('frontend.partials.heaader')

    </div>

    <section class="banner-bottom py-5">
        <div class="container py-5">
            <div class="row shop-wthree-info text-center">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{{ $message }}</strong>
            </div>
        <div class="container py-5">
            <p>Thank you for joining us!<br> Your design has been submitted successfully. We will contact you on the mobile number you provided for further information, including payment details.</p>
        </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
    <div class="main-block">


    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">


                      <form action="{{route('services.store')}}" method="post" enctype='multipart/form-data'>

                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="form2Example11" style="float:left">Name</label>
                          <input type="text" id="name" name="name" class="form-control"
                            placeholder="Your Name" style="@error('name') border:1px solid; border-color:red @enderror"/>
                            @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="form2Example22" style="float:left">Email</label>
                          <input type="email" id="email" name="email" placeholder="Your Email" class="form-control" style="@error('email') border:1px solid; border-color:red @enderror"/>
                          @error('email')
                          <p class="error">{{ $message }}</p>
                      @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="form2Example22" style="float:left">Phone Number</label>
                          <input type="number" id="phone" name="phone" placeholder="Your Number" class="form-control" style="@error('phone') border:1px solid; border-color:red @enderror" />
                          @error('phone')
                          <p class="error">{{ $message }}</p>
                      @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="form2Example22" style="float:left">Your Design</label>
                          <input type="file" id="design" name="design" placeholder="Your Number" class="form-control"  accept=".stl"/>
                          @error('design')
                          <p class="error">{{ $message }}</p>
                      @enderror
                        </div>
                        <br>

                        <div class="text-center pt-1 mb-5 pb-1">
                          <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Submit Design</button>

                        </div>

                      </form>

                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">Send Your design to us</h4>
                      <p class="small" style="color:white">We are offering you range of services to create and print your 3D Model .<br>
                        You can upload your stl file , we will connect to you and assist you further to get your imagination become reality .</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    </div>



@include('frontend.partials.footer')
