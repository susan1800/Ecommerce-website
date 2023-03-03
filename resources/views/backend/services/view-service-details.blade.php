@extends('backend.layouts.headerfooter')
@section ('title', 'Order - #'.$order->order_no)
@section('content')

	<!-- Order Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Order Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Service - #{{ $order->order_id }}
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	            <li><a href="{{ route('orders.index') }}"><i class="fa fa-opencart"></i> Orders</a></li>
	            <li class="active">#{{ $order->order_id }}</li>
	        </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">

	        <!-- Default box -->
	        <div id="listOrder">
	            <div class="box box-default box-solid">
	                <div class="box-header with-border">
	                    <h3 class="box-title">View Order Details</h3>

	                    <div class="box-tools pull-right">
	                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	                            <i class="fa fa-minus"></i>
	                        </button>
	                    </div>
	                </div>

	                <div class="box-body">
	                	<div class="row">
	                	    <div class="col-md-12">
	                	        <div class="box box-default box-solid">

	                	            <div class="box-header with-border">
	                	                <h5 class="box-title">
	                	                    <h3 class="box-title">Product Details</h3>

	                	                    <div class="btn-group pull-right" role="group">

	                	                        <!-- <button id="status-all" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                	                            Change Status for all product <span class="caret"></span>
	                	                        </button> -->

	                	                        <ul class="dropdown-menu" aria-labelledby="status-all">


	                	                        </ul>
	                	                    </div>
	                	                </h5>
	                	            </div>
	                	            <div class="box-body">

	                	                <div class="table-responsive">
	                	                    <table class="table header-border table-hover" id="orderTable">
	                	                        <thead>
	                	                            <tr>

	                	                                <th>SN</th>
	                	                                <th></th>
	                	                                <th><strong>Product Name</strong></th>
	                	                                <th><strong>Quantity</strong></th>
	                	                                <th class="text-right"><strong>Price</strong></th>
	                	                                <th class="text-right"><strong>Sub Total</strong></th>
	                	                                <th class="text-center"><strong>Status</strong></th>
	                	                                {{-- <th>Action</th> --}}
	                	                            </tr>
	                	                        </thead>
	                	                        <tbody>
	                	                        @php
	                	                        	$totalPrice = 0;
	                	                        @endphp
	                	                        @foreach($order->orderDetails as $key => $ordered_product)
	                	                            @php

	                	                            $product = \App\Models\Product::where("id", $ordered_product->product_id)->first();

	                	                            $totalPrice += $ordered_product->total_price;

	                	                            @endphp

	                	                            <tr>
	                	                                <th>{{ $key+1 }}.</th>
	                	                                <td class="text-center">

	                	                                    @if(isset($product))



	                	                                    @else

	                	                                        <img src="https://place-hold.it/100x100/eeeef5?text=Image%20Unavailable&fontsize=8&italic&bold" width="50">

	                	                                    @endif
	                	                                </td>

	                	                                <td class="text-left" >

	                	                                    @if(isset($product))

		                	                                    <a target="_blank" href="{{ url('product/'.$product->slug) }}">
		                	                                        <b>{{ $product->title }}</b>
		                	                                    </a>
		                	                                    <br>
		                	                                    <small>{{ $product->sku }}</small>
	                	                                    @else
	                	                                        <b>{{ $ordered_product->product_title }}</b>

	                	                                    @endif

	                	                                    <br>



	                	                                    <br>

	                	                                    @if(!isset($product))
	                	                                        <i style="font-size: 11px;">Product has been Deleted</i>
	                	                                    @endif



	                	                                </td>

	                	                                <td class="text-center" >
	                	                                    <b>{{(int)$ordered_product->quantity}}</b>
	                	                                </td>

	                	                                <td class="text-right" >
	                	                                    <strong>
	                	                                        Nrs.{{ $ordered_product->total_price/$ordered_product->quantity }}
	                	                                    </strong>
	                	                                </td>

	                	                                <td class="text-right" >
	                	                                    <strong>
	                	                                        Nrs.{{ $ordered_product->total_price }}
	                	                                    </strong>
	                	                                </td>

	                	                                <td class="ordered-product-status text-center" id="orderedProductStatus{{ $ordered_product->id }}" width="10%">

	                	                                </td>

	                	                            </tr>

	                	                        @endforeach
	                	                        <tr>
	                	                            <td colspan="5" class="text-right">Sub Total </td>
	                	                            <th class="text-right">Nrs.{{ number_format($totalPrice, 2) }}</th>
	                	                            <td colspan="3"></td>
	                	                        </tr>

	                	                        <!-- @if(isset($order->applied_coupon))
	                	                            <tr>
	                	                                <td colspan="5" class="text-right">
	                	                                	{{ $order->applied_coupon->coupon_title }}
	                	                                </td>
	                	                                <th class="text-right">
	                	                                	- Nrs.{{ number_format($order->applied_coupon->discount_amount, 2) }}
	                	                                </th>
	                	                                <td colspan="3"></td>
	                	                            </tr>

	                	                            @php
	                	                                $totalPrice = $totalPrice - $order->applied_coupon->discount_amount;
	                	                            @endphp
	                	                        @endif -->

	                	                        <tr>
	                	                            <td colspan="5" class="text-right"> Grand Total </td>
	                	                            <th class="text-right">Nrs.{{  number_format($totalPrice ,2)  }}</th>
	                	                            <td colspan="3"></td>
	                	                        </tr>
	                	                        </tbody>
	                	                    </table>
	                	                </div>
	                	            </div>
	                	        </div>
	                	    </div>
	                	</div>
	                	<div class="row" style="font-size: 12px !important;">

	                	    <div class="col-md-6">
	                	        <div class="box box-default box-solid">
	                	            <div class="box-header with-border">
	                	                <h5 class="text-white text-center">Billing Details</h5>
										</div>
									<div style="padding:10px">
										<p>Payment Method : {{$order->payment_type}}</p>
										<p>Payment Status : @if($order->payment_status == 1) Paid @else Unpaid @endif
									</div>

	                	        </div>
	                	    </div>
	                	    <div class="col-md-6">
	                	        <div class="box box-default box-solid">
	                	            <div class="box-header with-border">
	                	                <h5 class="text-white text-center">Shipping Details</h5>

	                	            </div>
									<div style="padding:10px">
                                        <p>Reveiver Name : {{$order->receiver_name}}</p>
                                        <p>Reveiver Number : {{$order->receiver_phone}}</p>
                                        <p>Email Address : {{$order->email}}</p>
										<p>Delivery Address : {{$order->shipping_address}}</p>
										<!-- <p>Payment Status : @if($order->payment_status == 1) Paid @else Unpaid @endif -->
									</div>

	                	        </div>
	                	    </div>
	                	</div>
	                </div>
	                <!-- /.box-body -->
	            </div>
	            <!-- /.box -->
	        </div>

	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- DELETE MODAL STARTS -->
    <div class="modal fade modal-danger" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Orders</h4>
                </div>
                <div class="modal-body">
                    <p>Deleting this file will also delete all the Orders, Images and all associated data.</p>
                    <p>Are You Sure&hellip;?</p>
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <a class="btn btn-outline" href="" onclick="">Delete</a>
                        <a data-dismiss="modal" class="btn btn-outline pull-left" href="javascript:void(0)">Cancel</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- DELETE MODAL ENDS -->
@endsection

@push('scripts')
	<script>
		$(".order-status-btn").click(function(){
		    var status = $(this).data('status');
		    var order_id = $(this).data('order-id');

		    $.ajax({
		        url : "{{ URL::route('orders.change-order-status') }}",
		        type : "POST",
		        data :{ '_token': '{{ csrf_token() }}',
		                id: order_id,
		                status: status
		            },
		        beforeSend: function(){

		        },
		        success : function(response)
		        {
		            console.log("response "+ response);
		            var obj = jQuery.parseJSON( response);

		            if (obj.status == 'success') {


		                $('#orderTable').load(document.URL + ' #orderTable');

		                if (status == 0) {
		                	toastr['warning']('Order Status changed to Pending!');
		                }else if (status == 1) {
		                	toastr['info']('Order is On Process!');
		                }else if (status == 2) {
		                	toastr['success']('Order Delivered Successfully!');
		                }else if (status == 3) {
		                	toastr['error']('Order is Cancelled!');
		                }


		            }else {

		                toastr['error']('Something went wrong!');


		            };
		        }
		    });
		});

	</script>
@endpush
