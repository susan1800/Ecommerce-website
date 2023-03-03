@extends('backend.layouts.headerfooter')
@section ('title', 'Testimonial')
@section('content')

    <!-- testimonial Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- testimonial Header (Page header) -->
        <section class="content-header">
            <h1>
                Testimonials
                <small>
                    List | Add | Update | Delete Testimonial
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('testimonials.index') }}"><i class="fa fa-rebel"></i> testimonials</a></li>
                    <li class="active">{{ request()->routeIs('testimonials.edit') ? 'Update testimonial' : 'Add New testimonial' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12" id="addtestimonial">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit testimonial Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('testimonials.edit') ? route('testimonials.update',$testimonial) : route('testimonials.store') }}" enctype="multipart/form-data">

                            @csrf

                            @if(request()->routeIs('testimonials.edit'))
                                @method('PUT')
                            @endif

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Name
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('testimonials.edit') ? $testimonial->name : (old('name') ? old('name') : '') }}" name="name" placeholder="Enter Name Here.." required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Position
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('testimonials.edit') ? $testimonial->position : (old('position') ? old('position') : '') }}" name="position" placeholder="Enter position Here.. (not required)" />
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php $display =  request()->routeIs('testimonials.edit') ? $testimonial->display : (old('display') ? old('display') : 1)  ?>
                                                <input name="display" @if(request()->routeIs('testimonials.edit'))
                                                @if($testimonial->display == '1') checked value="1"
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
                                                <i class="fa fa-text-width"></i>  Testimonial by
                                            </span>
                                            {{-- <input type="text" class="form-control" value="{{ request()->routeIs('testimonials.edit') ? $testimonial->position : (old('position') ? old('position') : '') }}" name="position" placeholder="Enter position Here.." required /> --}}
                                            <select class="form-control" name="testimonial_by">
                                                @if( request()->routeIs('testimonials.edit'))
                                                <option value="user" @if($testimonial->testimonial_by == 'user') selected @endif>Testimonial by Client</option>
                                                <option value="owner" @if($testimonial->testimonial_by == 'owner') selected @endif>Testimonial by Owner</option>
                                                @else
                                                <option value="user">Testimonial by Client</option>
                                                <option value="owner">Testimonial by Owner</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Star by user
                                            </span>
                                            {{-- <input type="text" class="form-control" value="{{ request()->routeIs('testimonials.edit') ? $testimonial->position : (old('position') ? old('position') : '') }}" name="position" placeholder="Enter position Here.." required /> --}}
                                            <select class="form-control" name="star">
                                                @if( request()->routeIs('testimonials.edit'))
                                                <option value="1" @if($testimonial->star == '1') selected @endif>1 star</option>
                                                <option value="2" @if($testimonial->star == '2') selected @endif> 2 star</option>
                                                <option value="3" @if($testimonial->star == '3') selected @endif>3 star</option>
                                                <option value="4" @if($testimonial->star == '4') selected @endif> 4 star</option>
                                                <option value="5" @if($testimonial->star == '5') selected @endif>5 star</option>
                                                @else
                                                <option value="1" >1 star</option>
                                                <option value="2"> 2 star</option>
                                                <option value="3" >3 star</option>
                                                <option value="4" > 4 star</option>
                                                <option value="5">5 star</option>
                                                @endif
                                            </select>
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
                                {{-- @if( request()->routeIs('testimonials.edit'))
                                    <img src="{{asset('storage/testimonial/'.$testimonial->image)}}" width="100">
                                    @endif --}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> <i class="fa fa-file"></i>
                                                Testimonial
                                            </label>
                                            <textarea name="details" class="ckeditor" rows="10" cols="80" placeholder="Testimonial">{{  request()->routeIs('testimonials.edit') ? $testimonial->details : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('testimonials.edit')) { ?>
                                    <a href="{{ route('testimonials.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE TESTIMONIAL
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE testimonial
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
        $('.testimonial-picker').testimonialpicker({
            useAlpha: false,
            format: "hex"
        });
    </script>
@endpush
