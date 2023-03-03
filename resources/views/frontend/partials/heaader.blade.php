<body>


            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">

                        <h1> <a href="index.html"><img src="{{asset('images/kaichologo.png')}}" style="width: 100px; height:100px; border-radius:50%"></a></h1>
                    </div>

                    <div class="forms ml-auto">
                        @php $total = 0 ; @endphp
                                @if(session('kaichocart'))
                                @php
                                $total = count(session()->get('kaichocart'));
                                @endphp
                                @endif
                        <a href="{{route('getcart')}}" class="btn"><span class="fa fa-shopping-cart" style="zoom:150%;"></span><span style="padding:5px; color:red;"> {{$total}}</span> </a>

                    </div>
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li class="{{ request()->routeIs('index') ? 'active' : '' }}"><a href="{{route('index')}}">Home</a></li>
                            <li class="{{ request()->routeIs('products') ? 'active' : '' }}"><a href="{{route('products')}}">Products</a></li>
                            <li class="{{ request()->routeIs('services') ? 'active' : '' }}"><a href="{{route('services')}}">Services</a></li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                    <div class="search-form ml-auto">

                        <div class="form-w3layouts-grid">

                            <form action="{{route('search')}}" method="post" class="newsletter">
                                @csrf
                                <input class="search" type="text" name="search" placeholder="Search here..." required="">
                                <button type="submit" class="form-control btn" value=""><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>
        <!-- //header -->

