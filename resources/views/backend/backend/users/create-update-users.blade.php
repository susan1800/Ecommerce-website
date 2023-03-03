@extends('backend.layouts.headerfooter')
@section ('title', 'Users')
@section('content')
    
    <!-- User Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- User Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>
                    List | Add | Update | Delete Admin Users
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-user-secret"></i> Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12" id="addUser">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit User's Details
                                @if(request()->routeIs('users.edit'))
                                    @if(Auth::user()->id == $user->id)
                                    <a href="#changePassword"
                                       class="btn btn-warning"
                                       data-toggle="modal"
                                       id="chngPass{{ $user->id }}"
                                       data-id="<?= $user->id; ?>"
                                       data-user="{{ $user->name }}"
                                       onClick="editPassword('{{ $user->id }}')">
                                        <i class="fa fa-key"></i> Change Password
                                    </a>
                                    @endif
                                @endif
                                

                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ request()->routeIs('users.edit') ? route('users.update',$user) : route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(request()->routeIs('users.edit'))
                                @method('PUT')
                            @endif
                            <div class="box-body">

                                <input type="hidden" id="userId" name="id" value="{{ request()->routeIs('users.edit') ? $user->id : '' }}"/>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-info"></i> Full Name</span>
                                                <input type="text" class="form-control" value="{{ request()->routeIs('users.edit') ? $user->name : old('name') }}" name="name" placeholder="eg: John Doe" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-at"></i> Email</span>
                                                <input type="email" class="form-control" value="{{ request()->routeIs('users.edit') ? $user->email : old('email') }}" name="email" placeholder="eg: johndoe@domain.com" {{ request()->routeIs('users.edit') ? 'readonly' : '' }} required/>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-info"></i> Gender</span>
                                                <select class="form-control" name="gender">
                                                    <option selected disabled>Select Gender</option>
                                                    <option value="Male" {{ request()->routeIs('users.edit') && $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ request()->routeIs('users.edit') && $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Others" {{ request()->routeIs('users.edit') && $user->gender == 'Others' ? 'selected' : '' }}>Others</option>
                                                </select>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">

                                        <!-- <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-info"></i> Phone</span>
                                                <input type="text" class="form-control" value="{{ request()->routeIs('users.edit') ? $user->phone : '' }}" name="phone" placeholder="eg: 98490000XX" required/>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-info"></i> Address</span>
                                                <input type="text" class="form-control" value="{{ request()->routeIs('users.edit') ? $user->address : '' }}" name="address" placeholder="Address" required/>
                                            </div>
                                        </div> -->

                                        <!-- <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-info"></i> City</span>
                                                <input type="text" class="form-control" value="{{ request()->routeIs('users.edit') ? $user->city : '' }}" name="city" placeholder="City" required/>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">

                                        

                                      


                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-anchor"></i> Role</span>
                                                
                                                <select name="role" class="form-control">

                                                    @foreach($roles as $role)
                                                    @if($role->name == 'super-admin')
                                                    @else
                                                        <option value="{{ $role->id }}" @if(request()->routeIs('users.edit')) @if($role->id == $user->role_id)selected @endif @endif>{{ $role->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        @if(request()->routeIs('users.create'))
                                            
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-link"></i> Password</span>
                                                    <input id="password" type="password" class="form-control" name="password"  placeholder="*******" />
                                                    <span class="input-group-addon toggle-password-type" data-input-id="password" data-icon-id="password-icon" style="cursor: pointer;" id="togglePassword"><i id="password-icon" class="fa fa-eye-slash"></i></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-link"></i> Confirm Password</span>
                                                    <input id="confirmPassword" type="password" class="form-control" name="password_confirmation"  placeholder="*******" />
                                                    <span class="input-group-addon toggle-password-type" data-input-id="confirmPassword" data-icon-id="confirm-password-icon" style="cursor: pointer;"><i id="confirm-password-icon" class="fa fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">

                                <?php if (request()->routeIs('users.edit')) { ?>
                                    <a href="{{ route('users.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE USER
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE USER
                                    </button>
                                <?php } ?>
                            </div>
                        </form>
                        <!-- form ends -->
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    

    <!-- Modal view -->
    <div class="modal fade" id="changePassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #F39C12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Password </h4>
                </div>
                <form method="POST" action="{{ route('users.update-password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info"></i> New Password</span>
                                    <input id="updateNewPassword" type="password" class="form-control" name="password" placeholder="New Password" required/>
                                    <span class="input-group-addon toggle-password-type" data-input-id="updateNewPassword" data-icon-id="update-new-password-icon" style="cursor: pointer;"><i id="update-new-password-icon" class="fa fa-eye-slash"></i></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info"></i> Retype Password</span>
                                    <input id="retypePassword" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required/>
                                    <span class="input-group-addon toggle-password-type" data-input-id="retypePassword" data-icon-id="retype-password-icon" style="cursor: pointer;"><i id="retype-password-icon" class="fa fa-eye-slash"></i></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info"></i> Old Password</span>
                                    <input id="oldPassword" type="password" class="form-control" name="oldpassword" placeholder="Old Password" required/>
                                    <span class="input-group-addon toggle-password-type" data-input-id="oldPassword" data-icon-id="old-password-icon" style="cursor: pointer;"><i id="old-password-icon" class="fa fa-eye-slash"></i></span>
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
            <!-- /.modal-users -->
            <!-- /.modal-users -->
        </div>
        <!-- /.modal-dialog -->

    </div>

@endsection

@push('scripts')
       
    <script type="text/javascript">

        $(".toggle-password-type").click(function(){
            var input_field_id = $(this).data('input-id');
            var icon_id = $(this).data('icon-id');
            console.log($("#"+input_field_id).attr('type'));
            // console.log(icon_id);

            if ($("#"+input_field_id).attr('type') == 'password') {
                console.log($("#"+input_field_id).attr('type'));
                $("#"+input_field_id).attr('type','text');
                $("#"+icon_id).removeClass('fa-eye-slash').addClass('fa-eye');
            }else{
                $("#"+input_field_id).attr('type','password');
                $("#"+icon_id).removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });

        

        $('#inputCountry').attr('required',false);
        $('#inputState').attr('required',false);

        if ($("#inputCountry").val() != null) {
            getStates($("#inputCountry").val(), '{{ request()->routeIs('users.edit') ? $user->region : ''}}');
        }

       

        function editPassword(id) {
            $('#editId').val(id);
        }
    </script>
@endpush