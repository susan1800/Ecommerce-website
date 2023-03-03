@extends('backend.layouts.headerfooter')
@section ('title', 'branch')
@section('content')
    
    <!-- branch Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- branch Header (Page header) -->
        <section class="content-header">
            <h1>
                Branches
                <small>
                    List | Add | Update | Delete branch
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('branches.index') }}"><i class="fa fa-rebel"></i> branches</a></li>
                    <li class="active">{{ request()->routeIs('branches.edit') ? 'Update branch' : 'Add New branch' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12" id="addbranch">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit branch Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('branches.edit') ? route('branches.update',$branch) : route('branches.store') }}" enctype="multipart/form-data">
                    
                            @csrf

                            @if(request()->routeIs('branches.edit'))
                                @method('PUT')
                            @endif
                            
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Name
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('branches.edit') ? $branch->name : (old('name') ? old('name') : '') }}" name="name" placeholder="Enter Name Here.." required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Address
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('branches.edit') ? $branch->address : (old('address') ? old('address') : '') }}" name="address" placeholder="Enter address Here.." required />
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php $display =  request()->routeIs('branches.edit') ? $branch->display : (old('display') ? old('display') : 1)  ?>
                                                <input name="display" @if(request()->routeIs('branches.edit'))
                                                @if($branch->display == '1') checked value="1"
                                                @else  value="1"
                                                @endif
                                                @else
                                                value="1" checked
                                                 @endif  type="checkbox">
                                            </span>
                                            <input type="text" value="Display" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Phone
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('branches.edit') ? $branch->phone : (old('phone') ? old('phone') : '') }}" name="phone" placeholder="Enter phone Here.." required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Email
                                            </span>
                                            <input type="email" class="form-control" value="{{ request()->routeIs('branches.edit') ? $branch->email : (old('email') ? old('email') : '') }}" name="email" placeholder="Enter email Here.." required />
                                        </div>
                                    </div>


                        
                                    

                                    

                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">

                                        <span class="input-group-addon">
                                            <i class="fa fa-text-width"></i>  Select Image
                                        </span>
                                        <input type="file" name="image">

                                       


                                        
                                    </div>
                                    
                                </div>
                                {{-- @if( request()->routeIs('branches.edit'))
                                    <img src="{{asset('storage/branch/'.$branch->image)}}" width="100">
                                    @endif --}}

                               

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('branches.edit')) { ?>
                                    <a href="{{ route('branches.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE branch
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE branch
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
    

@endsection

@push('scripts')
    
    <script>
        $('.branch-picker').branchpicker({
            useAlpha: false,
            format: "hex"
        });
    </script>
@endpush