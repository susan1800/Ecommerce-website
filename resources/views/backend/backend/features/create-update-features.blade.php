@extends('backend.layouts.headerfooter')
@section ('title', 'features')
@section('content')

    <!-- feature Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- feature Header (Page header) -->
        <section class="content-header">
            <h1>
                features
                <small>
                    List | Add | Update | Delete features
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('features.index') }}"><i class="fa fa-rebel"></i> features</a></li>
                    <li class="active">{{ request()->routeIs('features.edit') ? 'Update feature' : 'Add New feature' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12" id="addfeature">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit feature Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('features.edit') ? route('features.update',$feature) : route('features.store') }}" enctype="multipart/form-data">

                            @csrf

                            @if(request()->routeIs('features.edit'))
                                @method('PUT')
                            @endif

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Title
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('features.edit') ? $feature->title : (old('title') ? old('title') : '') }}" name="title" placeholder="Enter Title Here.." required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>  Subtitle
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('features.edit') ? $feature->subtitle : (old('subtitle') ? old('subtitle') : '') }}" name="subtitle" placeholder="Enter subtitle Name Here.." />
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php $display =  request()->routeIs('features.edit') ? $feature->display : (old('display') ? old('display') : 1)  ?>
                                                <input name="display" <?php echo($display == 1 ? 'checked' : ''); ?> value="1" type="checkbox">
                                            </span>
                                            <input type="text" value="Display" class="form-control" readonly="readonly">



                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-image"></i> icon
                                            </span>
                                            <input id="imageField" class="btn btn-info btn-flat" type="file" name="icon" {{ request()->routeIs('features.create') ? 'required' : '' }}>
                                        </div>

                                    </div>


                                </div>
                                <div class="row imageDiv" style="margin-left: 0px; margin-right: 0px;">
                                    <?php if (request()->routeIs('features.edit')): ?>

                                        <div class="col-lg-4 col-md-3 col-xs-6" style="min-height:100px;">
                                            <img class="img-responsive" src="{{ asset('storage/features/'.$feature->icon) }}" width="60%" alt="N/a"/>
                                        </div>

                                        <div class="col-lg-8 col-md-9 col-xs-6 ">
                                            <div class="row ">


                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <br>

                                <div class="row">
                                    {{-- <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> &nbsp;&nbsp;&nbsp; Description</label>
                                            <textarea class="form-control" name="short_description" rows="10" cols="80" placeholder="Short Highlights">{{ request()->routeIs('features.edit') ? $feature->short_description : '' }}</textarea>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> &nbsp;&nbsp;&nbsp;Description</label>
                                            <textarea class="form-control ckeditor" name="short_description" rows="10" cols="80" placeholder="Short Highlights">{{ request()->routeIs('features.edit') ? $feature->short_description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('features.edit')) { ?>
                                    <a href="{{ route('features.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE feature
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE feature
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

    <div class="modal fade modal-danger" id="delete_image">
        <div class="modal-dialog " role="document">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Delete Gallery Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-white">
                    <p>Are you Sure...!!</p>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                    <button id="confirmDeleteGalleryImage" data-slug="" data-gallery-image="" data-gallery-image-id="" class="btn btn-round btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        // <---------- Delete Image Modal ---------->
        function delete_image(slug, image, galleryImageId) {

            $("#confirmDeleteGalleryImage").attr('data-slug', slug);
            $("#confirmDeleteGalleryImage").attr('data-image', image);
            $("#confirmDeleteGalleryImage").attr('data-gallery-image-id', galleryImageId);
        }

        // <---------- Delete feature Gallery Image ---------->
        jQuery("#confirmDeleteGalleryImage").click(function(){

            $("#delete_image").modal('hide');

            var slug = $(this).attr('data-slug');
            var image = $(this).attr('data-image');
            var gallery_image_id = String($(this).attr('data-gallery-image-id'));

            $.ajax({
                url : "",
                type : "POST",
                data :{ '_token': '{{ csrf_token() }}',
                        slug: slug,
                        image: image
                    },
                cache : false,
                beforeSend : function (){
                    $('#modal-loader').show();
                },
                complete : function($response, $status){

                    if ($status != "error" && $status != "timeout") {

                        var obj = jQuery.parseJSON($response.responseText);

                        if (obj.message == 'success') {
                            $("#"+gallery_image_id).remove();
                        }else{
                            toastr['error']('Something went wrong!','Error');
                        }
                        $('#modal-loader').hide();
                        // $("#pageUrl").html($response.responseText);

                    }
                },
                error : function ($responseObj){
                    alert("Something went wrong while processing your request.\n\nError => "
                        + $responseObj.responseText);
                    $('#modal-loader').hide();
                }
            });
        });
    </script>
@endpush
