@extends('backend.layouts.headerfooter')
@section ('title', 'Contents')
@section('content')
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Contents
                <small>
                    List | Add | Update | Delete Contents
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('contents.index') }}"><i class="fa fa-rebel"></i> Contents</a></li>
                    <li class="active">{{ request()->routeIs('contents.edit') ? 'Update Content' : 'Add New Content' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12" id="addContent">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit Content's Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('contents.edit') ? route('contents.update',$content) : route('contents.store') }}" enctype="multipart/form-data">
                    
                            @csrf

                            @if(request()->routeIs('contents.edit'))
                                @method('PUT')
                            @endif
                            
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Title
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('contents.edit') ? $content->title : (old('title') ? old('title') : '') }}" name="title" placeholder="Enter Title Here.." required />
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-image"></i> Image 
                                            </span>
                                            <input id="imageField" class="btn btn-info btn-flat" type="file" name="image" {{ request()->routeIs('contents.create') ? 'required' : '' }}>
                                        </div>
                                        <small>
                                            <b>Recommended Image resolution:</b> 1200x800px image recommended.
                                        </small>
                                    </div>
                                    @if (request()->routeIs('contents.edit')): ?>

                                        <div class="col-lg-4" style="min-height:100px;">
                                            <img class="img-responsive" src="{{ asset('storage/contents/'.$content->slug.'/thumbs/thumb_'.$content->image) }}" width="60%" alt="N/a"/>
                                        </div>
                                    @endif --}}

                                </div>
                                
                                <br>
                                
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> &nbsp;&nbsp;&nbsp;Content</label>
                                            <textarea class="form-control ckeditor" name="description" rows="10" cols="80" placeholder="Description">{{ request()->routeIs('contents.edit') ? $content->description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('contents.edit')) { ?>
                                    <a href="{{ route('contents.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE
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
    
    
@endpush