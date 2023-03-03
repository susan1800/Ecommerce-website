@extends('backend.layouts.headerfooter')
@section ('title', 'Services')
@section('content')

	<!-- Order Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Order Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Services
	            <small>
	                View All Services from Customers
	            </small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	            <li class="active"><i class="fa fa-shopping-cart"></i> Services</li>
	        </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">

	        <!-- Default box -->
	        <div id="listOrder">
	            <div class="box box-default box-solid">
	                <div class="box-header with-border">
	                    <h3 class="box-title">View All Services</h3>

	                    <div class="box-tools pull-right">
	                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	                            <i class="fa fa-minus"></i>
	                        </button>
	                    </div>
	                </div>

	                <div class="box-body">
	                	<table id="orders-list" class="table table-bordered table-striped">
	                		<thead>
	                			<tr>
	                				<th>Service#</th>
	                				<th>Send date</th>
	                				<th>Customer Name</th>
	                				<th>Customer Email</th>
                                    <th>Customer Number</th>
	                				<th>Service status</th>
	                				<th>Action</th>
	                			</tr>
	                		</thead>
	                		<tbody>
                                @php
                                    $k=1;
                                @endphp
	                			@foreach($services as $key => $order)
	                			<tr>
	                				<td class="text-center">
	                					<a href="">
	                						<strong>{{$k}}</strong>
	                					</a>
	                				</td>

	                				<td><small>{{ date('jS M, Y H:i:s', strtotime($order->created_at)) }}</small></td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->mobile }}</td>
	                				<td id="orderStatus{{ $order->id }}">

										@if($order->status == 1)
										Pending <span style="color:red;">*</span>
										@else
										Completed
										@endif

                                    </td>


                                	<td class="text-left">
                                		<div class="btn-group">
                                			<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                				Action <span class="caret"></span>
                                			</button>
                                			<ul class="dropdown-menu">
                                                @php
                                                    $link = asset('storage/'.$order->design);
                                                @endphp
                                            <li><a download="{{$order->design}}" href="{{$link}}" target="blank">Download Design</a></li>
												<li> <a href="{{route('editservice' , $order->id)}}"> Mark as Completed </a> </li>

                                			</ul>
                                		</div>
                                    </td>

	                			</tr>
                                @php
                                    $k++;
                                @endphp
	                			@endforeach
	                		</tbody>
	                	</table>
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



<script>



finction seenservice(id,link){
            alert('fg');
            $.ajax({
		        url : "{{ URL::route('view.service', "+id+") }}",
		        type : "POST",
		        data :{ '_token': '{{ csrf_token() }}',
		                id: order_id,
		                status: status
		            },
		        beforeSend: function(){

		        },
		        success : function(response)
		        {
                    window.open(link, '_blank');
                }
                error:function(e){
                    alert('error');
                }
            });
        }

</script>

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


		                $('#orderStatus'+order_id).load(document.URL + ' #orderStatus'+order_id+'>*');
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

		$('#orders-list').DataTable({
		    "paging": true,
		    "lengthChange": true,
		    "searching": true,
		    "ordering": true,
		    "info": true,
		    "autoWidth": false
		});
        /*Delete Menu Ends*/





	</script>
@endpush
