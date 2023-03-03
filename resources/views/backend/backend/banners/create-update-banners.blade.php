@extends('backend.layouts.headerfooter')
@section ('title', 'Banners')
@section('content')

    <!-- Banner Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Banner Header (Page header) -->
        <section class="content-header">
            <h1>
                Banners
                <small>
                    List | Add | Update | Delete Banners
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('banners.index') }}"><i class="fa fa-image"></i> Banners</a></li>
                    <li class="active">{{ request()->routeIs('banners.edit') ? 'Update Banner' : 'Add New Banner' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12" id="addBanner">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit Banner's Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('banners.edit') ? route('banners.update',$banner) : route('banners.store') }}" enctype="multipart/form-data">

                            @csrf

                            @if(request()->routeIs('banners.edit'))
                                @method('PUT')
                            @endif

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Title
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('banners.edit') ? $banner->title : (old('title') ? old('title') : '') }}" name="title" placeholder="Enter Title Here.." required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-link"></i>  Link
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('banners.edit') ? $banner->link : (old('link') ? old('link') : '') }}" name="link" placeholder="Enter Link Here.." required />
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php $display =  request()->routeIs('banners.edit') ? $banner->display : (old('banner') ? old('banner') : 1)  ?>
                                                <input name="display" <?php echo($display == 1 ? 'checked' : ''); ?>  value="1" type="checkbox">
                                            </span>
                                            <input type="text" value="Display" class="form-control" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-image"></i> Image
                                            </span>
                                            <input id="imageField" class="btn btn-info btn-flat" type="file" name="image" {{ request()->routeIs('banners.create') ? 'required' : '' }}>
                                        </div>
                                        <small>Recommended size: 1920px X 800px for best fit.</small>
                                    </div>

                                    <div class="col-md-2">
                                        @if(request()->routeIs('banners.edit'))
                                            <img class="img-thumbnail " width="40%" src="{{ asset('storage/banners/thumbs/thumb_'.$banner->image) }}">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  short details
                                            </span>
                                            <textarea class="form-control" name="subtitle" placeholder="Enter subtitle Here.." rows="3">{{ request()->routeIs('banners.edit') ? $banner->subtitle : (old('subtitle') ? old('subtitle') : '') }}</textarea>
                                            {{-- <input type="text" class="form-control" value="{{ request()->routeIs('banners.edit') ? $banner->subtitle : (old('subtitle') ? old('subtitle') : '') }}" name="subtitle" placeholder="Enter subtitle Here.." required /> --}}
                                        </div>
                                    </div>
                                </div>
                                <br>

                                {{-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> &nbsp;&nbsp;&nbsp;Content</label>
                                            <textarea class="form-control ckeditor" name="content" rows="10" cols="80" placeholder="Long Content">
                                                {{ request()->routeIs('banners.edit') ? $banner->content : '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('banners.edit')) { ?>
                                    <a href="{{ route('banners.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE BANNER
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE BANNER
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

    </script>
@endpush
