@extends('backend.layouts.headerfooter')
@section ('title', 'Customer Wishlist')
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
                                        <a href="{{ route('customers.orders', [ 'id' => base64_encode($id)]) }}">
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
                        <div class="box box-primary box-solid">
                            <div class="box-header">
                                <h4 class="box-title">Wishlist</h4>
                            </div>

                            <div class="box-body">
                                <div class="table-content table-responsive">
                                    <table class="table table-bordered table-striped" id="wishlistItems">
                                        <thead>
                                            <tr>
                                                <th>images</th>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th>Stock Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wishlists as $key => $wishlist)
                                            <tr>
                                                
                                                <td class="kenne-product-thumbnail">
                                                    <a target="_blank" href="{{ route('product-details', ['slug' => $wishlist->product->slug]) }}" >

                                                        <img src="{{ asset('storage/products/'.$wishlist->product->slug.'/thumbs/thumb_'.$wishlist->product->image) }}" class="img-thumbnail" alt="{{ $wishlist->product->slug }}" width="50">

                                                    </a>

                                                </td>
                                                <td class="kenne-product-name">
                                                    <a target="_blank" href="{{ route('product-details',['slug' => $wishlist->product->slug]) }}">{{ $wishlist->product->title }}</a>
                                                </td>
                                                <td class="kenne-product-price">
                                                    <span class="amount">
                                                        Nrs.{{ $wishlist->product->discounted_price != NULL || $wishlist->product->discounted_price != 0 ? $wishlist->product->discounted_price : $wishlist->product->price }}
                                                    </span>
                                                </td>
                                                <td class="kenne-product-stock-status">
                                                    <span class="{{ $wishlist->product->stock_status == 1 ? 'in-stock' : 'out-stock' }}">{{ $wishlist->product->stock_status == 1 ? 'In Stock' : 'Out Stock' }}</span>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@push('scripts')
    <script>
        $('#orders-list').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    </script>
@endpush