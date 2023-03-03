@extends('backend.layouts.headerfooter')
@section ('title', 'video')
@section('content')
    
    <!-- video Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- video Header (Page header) -->
        <section class="content-header">
            <h1>
                videos
                <small>
                    List | Add | Update | Delete video
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('videos.index') }}"><i class="fa fa-rebel"></i> videos</a></li>
                    <li class="active">{{ request()->routeIs('videos.edit') ? 'Update video' : 'Add New video' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12" id="addvideo">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit video Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('videos.edit') ? route('videos.update',$video) : route('videos.store') }}" enctype="multipart/form-data">
                    
                            @csrf

                            @if(request()->routeIs('videos.edit'))
                                @method('PUT')
                            @endif
                            
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Link
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('videos.edit') ? $video->link : (old('link') ? old('link') : '') }}" name="link" placeholder="Enter youtube link Here.." required />
                                        </div>
                                    </div>
                                   

                                    
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                
                                                <input name="display"
                                                 @if(request()->routeIs('videos.edit'))
                                                @if($video->display == '1') checked value="1"
                                                @else  value="1"
                                                @endif
                                                @else
                                                value="1" checked
                                                 @endif  type="checkbox">
                                            </span>
                                            <input type="text" value="Display" class="form-control" readonly="readonly">
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
                                {{-- @if( request()->routeIs('videos.edit'))
                                    <img src="{{asset('storage/video/'.$video->image)}}" width="100">
                                    @endif --}}

                               

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('videos.edit')) { ?>
                                    <a href="{{ route('videos.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE video
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE video
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
        $('.video-picker').videopicker({
            useAlpha: false,
            format: "hex"
        });
    </script>
@endpush