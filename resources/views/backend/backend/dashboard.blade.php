@extends('backend.layouts.headerfooter')
@section ('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Aayuva International</small>
        </h1>
        {{-- <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('users.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Users</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('setting') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Site Settings</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('categories.index') }}">
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

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('products.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Products</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('brands.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-rebel"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Brands</span>
                        </div>
                    </div>
                </a>
            </div> --}}

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('banners.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-image"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Banners</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('colors.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-eyedropper"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Colors</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('sizes.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple"><i class="fa fa-object-ungroup"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Sizes</span>
                        </div>
                    </div>
                </a>
            </div> -->

            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('discount-coupons.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-percent"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Discount Coupons</span>
                        </div>
                    </div>
                </a>
            </div> -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('orders.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-opencart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Orders</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('blogs.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-rss"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Blogs</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('customers.list') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Customers</span>
                        </div>
                    </div>
                </a>
            </div> -->





            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('faqs.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-question"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">FAQ's</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('branches.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-th"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Branches</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('testimonials.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-quote-right"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Testimonials</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('features.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-object-ungroup"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Features</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('basicdetails.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-edit"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Basic Details</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('videos.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-youtube-play"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Videos</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('vacancies.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-file-text-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Go To Page
                                <small><i class="fa fa-chevron-right" aria-hidden="true"></i></small>
                            </span>
                            <span class="info-box-number">Vacency</span>
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
