@extends('backend.layouts.headerfooter')
@section ('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard

        </h1>
        {{-- <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('categories.index')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-anchor"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Categories</span>
                        </div>
                    </div>

                </a>

            </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('products.index')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Product</span>
                        </div>
                    </div>


                </a>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('services.index')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-rss"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Service</span>
                        </div>
                    </div>

                </a>
                </div>


                <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="{{route('orders.index')}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-opencart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Order</span>
                        </div>
                    </div>

                </a>
                </div>
            </div>






    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
