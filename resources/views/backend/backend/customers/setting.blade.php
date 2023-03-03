@extends('backend.layouts.headerfooter')
@section ('title', 'Customer Setting')
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
                                <h4 class="box-title">Account Settings</h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('customers.update-account-settings',['id' => base64_encode($id)]) }}" class="kenne-form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" for="account-details-firstname">First Name*</span>
                                                <input class="form-control" name="name" type="text" id="account-details-firstname" value="{{ $customer->name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" for="account-details-email">Email*</span>
                                                <input class="form-control" type="email" id="account-details-email" value="{{ $customer->email }}" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" for="account-details-oldpass">Current Password</span>
                                                <input class="form-control" name="old_password" type="password" id="account-details-oldpass">
                                            </div>
                                            <small>Leave Blank to leave unchanged</small>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" for="account-details-newpass">New Password </span>
                                                <input class="form-control" name="password" type="password" id="account-details-newpass">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" for="account-details-confpass">Confirm New Password</span>
                                                <input class="form-control" name="password_confirmation" type="password" id="account-details-confpass">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            
                                                <button class="btn btn-success" type="submit"><span>SAVE CHANGES</span></button>
                                        </div>
                                        
                                    </div>
                                </form>
                                
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