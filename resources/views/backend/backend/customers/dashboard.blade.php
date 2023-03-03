@extends('backend.layouts.headerfooter')
@section ('title', 'Customers')
@section('content')
    
    <!-- Customer Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Customer Header (Page header) -->
        <section class="content-header">
            <h1>
                Customers
                <small>
                    List | Add | Update | Delete Customers
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-user-secret"></i> Customers</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div id="listCustomer">
                <div class="row">
                    <div class="col-md-3">

                        <div class="box box-widget widget-user-2">
                            
                            <div class="widget-user-header bg-yellow">
                                {{-- <div class="widget-user-image">
                                    <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
                                </div> --}}
                                
                                <h3 class="widget-user-username" style="margin-left: 5px;">{{ $customer->name }}</h3>
                                {{-- <h5 class="widget-user-desc">Lead Developer</h5> --}}
                            </div>

                            <div class="box-body no-padding">
                                <ul class="nav nav-stacked">
                                    <li>
                                        <a href="{{ route('customers.dashboard', [ 'id' => base64_encode($id)]) }}">
                                            Dashboard 
                                        </a>
                                    </li>


                                    <li>
                                        <a href="{{ route('customers.orders', ['id' => base64_encode($id)]) }}">
                                            Orders <span class="pull-right badge bg-aqua">{{ $customer->customer_orders->count() }}</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('customers.addresses', [ 'id' => base64_encode($id)]) }}">
                                            Addresses 
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('customers.setting', [ 'id' => base64_encode($id)]) }}">
                                            Account Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customers.wishlist', [ 'id' => base64_encode($id)]) }}">
                                            Wishlists 
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-9">
                        <div class="box box-default box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Customer Dashboard
                                    {{-- <a href="{{ route('customers.create') }}" class="btn btn-primary" title="Add New Customer">
                                        <i class="fa fa-plus"></i> Add Customer
                                    </a> --}}
                                </h3>

                                
                            </div>

                            <div class="box-body">
                                <h3>Hello <b>{{ $customer->name }}</b> , Welcome!</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary box-solid">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    Last 5 Orders
                                                    
                                                </h4>

                                                <a class="btn btn-sm btn-default pull-right" href="{{ route('customers.orders', ['id' => base64_encode($id)]) }}">View All</a>

                                            </div>
                                            <div class="box-body">
                                                @if($orders->count() == 0)
                                                    <p class="text-center"> Customer Doesn't have any order placed yet</p>
                                                @else
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <th>ORDER #</th>
                                                                    <th>Ordered Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total Price</th>
                                                                    
                                                                </tr>
                                                                @foreach($orders as $key => $order)
                                                                <tr>
                                                                    <td >
                                                                        <a href="{{ route('orders.show', $order->order_no) }}">
                                                                            <strong>#{{ $order->order_no }}</strong>
                                                                        </a>
                                                                    </td>
                                                                    <td><small>{{ date('jS M, Y H:i:s', strtotime($order->created_at)) }}</small></td>
                                                                    <td>
                                                                        <small class="label label-{{ $order_status[$order->status][1] }}" >
                                                                            {{ $order_status[$order->status][0] }}
                                                                        </small>
                                                                    </td>
                                                                    <td>Nrs.{{ $order->total_price }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <div class="box box-primary box-solid">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    Billing & Shipping Addresses 
                                                    
                                                </h4>
                                                <a class="btn btn-sm btn-default pull-right" href="{{ route('customers.addresses',['id' => base64_encode($id)]) }}">Edit Addresses</a>
                                            </div>
                                            <div class="box-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><strong>Billing Address</strong></h4>
                                                        
                                                        @if($billing_address)
                                                        <address>
                                                            <b>{{ $billing_address->name }}</b><br>
                                                            <i>{{ $billing_address->email }}</i>, {{ $billing_address->phone }}<br>
                                                            @if($billing_address->apt_ste_bldg != '' )
                                                            {{ $billing_address->apt_ste_bldg }}<br>
                                                            @endif
                                                            {{ $billing_address->street_address }}<br>
                                                            {{ $billing_address->city }}, {{ DB::table('states')->where('id', $billing_address->state)->first()->name }}
                                                            {{ $billing_address->zip_code }}<br>
                                                            {{ DB::table('countries')->where('id', $billing_address->country)->first()->name }}
                                                            
                                                        </address>
                                                        @else
                                                            <p>Haven't updated Billing Details</p>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h4><strong>Shipping Address</strong></h4>
                                                        
                                                        @if($shipping_address)
                                                        <address>
                                                            <b>{{ $shipping_address->name }}</b><br>
                                                            <i>{{ $shipping_address->email }}</i>, {{ $shipping_address->phone }}<br>
                                                            @if($shipping_address->apt_ste_bldg != '' )
                                                            {{ $shipping_address->apt_ste_bldg }}<br>
                                                            @endif
                                                            {{ $shipping_address->street_address }}<br>
                                                            {{ $shipping_address->city }}, {{ DB::table('states')->where('id', $shipping_address->state)->first()->name }}
                                                            {{ $shipping_address->zip_code }}<br>
                                                            {{ DB::table('countries')->where('id', $shipping_address->country)->first()->name }}
                                                            
                                                        </address>
                                                        @else
                                                            <p>aven't updated Shipping Details</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                
                            </div>
                            <!-- /.box-footer-->
                        </div>
                        <!-- /.box -->
                    </div>
                    
                </div>
                
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection