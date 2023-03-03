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
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">View All Customers |  
                            {{-- <a href="{{ route('customers.create') }}" class="btn btn-primary" title="Add New Customer">
                                <i class="fa fa-plus"></i> Add Customer
                            </a> --}}
                        </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                @foreach($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $key+1 }}.</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>
                                            {{ $customer->email }}
                                        </td>
                                        <td width="20%">

                                            <a href="{{ route('customers.dashboard', base64_encode($customer->id)) }}"
                                               class="btn btn-sm btn-primary edit">View Details</a>

                                            <a href="#delete"
                                               data-toggle="modal"
                                               data-id="{{ $customer->id }}"
                                               id="delete{{ $customer->id }}"
                                               class="btn btn-sm btn-danger edit"
                                               onclick="delete_menu({{ $customer->id }})"> Delete
                                            </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <b><?= isset($customers) ? count($customers) : '' ?></b> Customers listed.
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>

        /*Delete Menu*/
        function delete_menu(id) {
            var conn = './customers/delete/' + id;
            $('#delete a').attr("href", conn);
        }
        
    </script>
    <!--    Initialize Multi Select   -->

    <!-- DELETE MODAL STARTS -->
    <div class="modal fade modal-danger" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Customer</h4>
                </div>
                <div class="modal-body">
                    <p>Are You Sure&hellip;?</p>
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <a class="btn btn-outline" href="" onclick="">Delete</a>
                        <a data-dismiss="modal" class="btn btn-outline pull-left" href="#">Cancel</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- DELETE MODAL ENDS -->

    <!-- Modal view -->
    <div class="modal fade" id="changePassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #F39C12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Password </h4>
                </div>
                <form method="POST" action="{{ route('customers.update-password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info"></i> New Password</span>
                                    <input type="password" class="form-control" name="password" placeholder="New Password" required/>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info"></i> Retype Password</span>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required/>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info"></i> Old Password</span>
                                    <input type="password" class="form-control" name="oldpassword"
                                           placeholder="Old Password" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: #F39C12">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="updateSend" class="btn btn-outline" name="updatePassword"><i
                                class="fa fa-plus"></i>
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-customers -->
            <!-- /.modal-customers -->
        </div>
        <!-- /.modal-dialog -->

    </div>



    <!-- alert message dismiss -->
    <script type="text/javascript">

        function editPassword(id) {
            $('#editId').val(id);
        }
    </script>
@endsection