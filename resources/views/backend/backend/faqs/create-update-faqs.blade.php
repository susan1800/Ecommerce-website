@extends('backend.layouts.headerfooter')
@section ('title', 'faq')
@section('content')
    
    <!-- faq Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- faq Header (Page header) -->
        <section class="content-header">
            <h1>
                faqs
                <small>
                    List | Add | Update | Delete faq
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('faqs.index') }}"><i class="fa fa-rebel"></i> faqs</a></li>
                    <li class="active">{{ request()->routeIs('faqs.edit') ? 'Update faq' : 'Add New faq' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12" id="addfaq">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit faq Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('faqs.edit') ? route('faqs.update',$faq) : route('faqs.store') }}" enctype="multipart/form-data">
                    
                            @csrf

                            @if(request()->routeIs('faqs.edit'))
                                @method('PUT')
                            @endif
                            
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Question
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('faqs.edit') ? $faq->title : (old('title') ? old('title') : '') }}" name="title" placeholder="Enter Question Here.." required />
                                        </div>
                                    </div>
                         

                                    
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php $display =  request()->routeIs('faqs.edit') ? $faq->display : (old('display') ? old('display') : 1)  ?>
                                                <input name="display" @if(request()->routeIs('faqs.edit'))
                                                @if($faq->display == '1') checked value="1"
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> <i class="fa fa-file"></i>
                                                Answer
                                            </label>
                                            <textarea name="details" class="ckeditor" rows="10" cols="80" placeholder="faq">{{  request()->routeIs('faqs.edit') ? $faq->details : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('faqs.edit')) { ?>
                                    <a href="{{ route('faqs.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE faq
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE faq
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
        $('.faq-picker').faqpicker({
            useAlpha: false,
            format: "hex"
        });
    </script>
@endpush