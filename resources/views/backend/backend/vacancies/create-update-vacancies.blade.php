@extends('backend.layouts.headerfooter')
@section ('title', 'vacancy')
@section('content')
    
    <!-- vacancy Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- vacancy Header (Page header) -->
        <section class="content-header">
            <h1>
                vacancies
                <small>
                    List | Add | Update | Delete vacancy
                </small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('vacancies.index') }}"><i class="fa fa-rebel"></i> vacancies</a></li>
                    <li class="active">{{ request()->routeIs('vacancies.edit') ? 'Update vacancy' : 'Add New vacancy' }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12" id="addvacancy">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">

                            <h3 class="box-title">Add || Edit vacancy Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ request()->routeIs('vacancies.edit') ? route('vacancies.update',$vacancy) : route('vacancies.store') }}" enctype="multipart/form-data">
                    
                            @csrf

                            @if(request()->routeIs('vacancies.edit'))
                                @method('PUT')
                            @endif
                            
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  Title
                                            </span>
                                            <input type="text" class="form-control" value="{{ request()->routeIs('vacancies.edit') ? $vacancy->title : (old('title') ? old('title') : '') }}" name="title" placeholder="Enter Title Here.." required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <span class="input-group-addon">
                                                <i class="fa fa-text-width"></i>  End Date
                                            </span>
                                            <input type="date" class="form-control" value="{{ request()->routeIs('vacancies.edit') ? $vacancy->enddate : (old('enddate') ? old('enddate') : '') }}" name="enddate" placeholder="Enter enddate Here.." required />
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <?php $display =  request()->routeIs('vacancies.edit') ? $vacancy->display : (old('display') ? old('display') : 1)  ?>
                                                <input name="display" @if(request()->routeIs('vacancies.edit'))
                                                @if($vacancy->display == '1') checked value="1"
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
                                <div class="row">
                                    

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label class="input-group-addon" for="content"> &nbsp;&nbsp;&nbsp;Description</label>
                                            <textarea class="form-control ckeditor" name="details" rows="10" cols="80" placeholder="Short Highlights">{{ request()->routeIs('vacancies.edit') ? $vacancy->details : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                

                               

                            </div>
                            <div class="box-footer">

                                <?php if (request()->routeIs('vacancies.edit')) { ?>
                                    <a href="{{ route('vacancies.index') }}" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submitEdit" class="btn btn-primary pull-right">UPDATE vacancy
                                    </button>
                                <?php } else { ?>
                                    <a onclick="cancleAdd()" class="btn btn-danger">CANCEL</a> &nbsp;
                                    <button type="submit" name="submit" class="btn btn-success pull-right">SAVE vacancy
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
        $('.vacancy-picker').vacancypicker({
            useAlpha: false,
            format: "hex"
        });
    </script>
@endpush