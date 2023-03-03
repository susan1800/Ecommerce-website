@extends('backend.layouts.headerfooter')
@section ('title', 'vacancy')
@section('content')

    <!-- vacancy Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- vacancy Header (Page header) -->

        <section class="content-header">
            <h1>
                vacancy
                <small>
                    List | Add | Update | Delete vacancy
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-eyedropper"></i> vacancy</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div id="listvacancy">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">View All vacancy |  
                            <a href="{{ route('vacancies.create') }}" class="btn btn-primary" title="Add New vacancy">
                                <i class="fa fa-plus"></i> Add vacancy
                            </a>
                        </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="4%">SN.</th>
                                        <th width="40%">title</th>
                                        <th width="20%">details</th>
                                        <th width="20%">end date</th>
                                        <th width="">Display</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vacancy as $key => $vacancy)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>
                                            <b>{{ $vacancy->title }}</b>&nbsp;|&nbsp; 
                                            <img width="20%" class="img-thumbnail" src="{{ asset('storage/vacancy/'.$vacancy->image) }}">
                                            <small>
                                                <i>
                                                    @if($vacancy->display == 1)
                                                    
                                                        <i style="vacancy: green;" class="fa fa-eye"></i>
                                                    
                                                    @else
                                                    
                                                        <i style="vacancy: red;" class="fa fa-eye-slash"></i>
                                                    @endif

                                                </i>
                                            </small>

                                        </td>
                                        <td>
                                            {!! $vacancy->details !!}
                                            
                                        </td>
                                        <td>
                                            {{ $vacancy->enddate }}
                                            
                                        </td>
                                      
                                        
                                        <td>
                                            @if($vacancy->display == 1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-default">InActive</span>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <span class="content-right">
                                                {{-- <a href="#viewvacancy"
                                                    data-toggle="modal"
                                                    data-id="{{ $vacancy->id }} "
                                                    data-details='{{ $vacancy->content }}'
                                                    data-display="{{ $vacancy->display }}"
                                                    id="view{{ $vacancy->id }}"
                                                    class="btn btn-sm btn-success"
                                                    onClick="view_content('{{$vacancy->id }} ','{{addslashes($vacancy->title) }} ','{{$vacancy->image }}')"><i class="fa fa-eye"></i></a> --}}

                                                <a href="{{ route('vacancies.edit', base64_encode($vacancy->id)) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                
                                                <a href="#delete"
                                                   data-toggle="modal"
                                                   data-id="{{ $vacancy->id }}"
                                                   id="delete{{ $vacancy->id }}"
                                                   title="Delete" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="delete_menu('{{ base64_encode($vacancy->id) }}')"><i class="fa fa-trash  "></i>
                                               </a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <button type="submit" class="btn btn-block btn-default">Save All</button>
                                        </td>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        function view_content(id, title, image) {
            var display = $('#view' + id).attr('data-display');

            if (display == 0) {
                $('#viewDisplay').html('<small class="label label-danger">Not Displayed</small>');
            }else{
                $('#viewDisplay').html('<small class="label label-success">Displayed</small>');
            }

            $('#viewId').val(id);
            $('#viewTitle').html(title);
            if (image != '') {
                $('#viewImage').show();
                $('#viewImage').attr('src', "{{ asset('storage/vacancy/thumbs/thumb_') }}" + image);
            }else{
                $('#viewImage').hide();
            }
            $('#viewContents').html(content);
        }  


        /*Delete Menu*/
        function delete_menu(id) {
            var conn = './vacancy/delete/' + id;
            $('#delete a').attr("href", conn);
        }
        /*Delete Menu Ends*/
        
    </script>
    <!--    Initialize Multi Select   -->

    <div class="modal fade" id="viewvacancy">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #449D44">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><span id="viewTitle"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img  id="viewImage" src="" class="img-responsive center-block">
                    </div>
                    <br>
                    <div class="row">
                        <span id="viewDisplay"></span>
                    </div>
                    <br>
                </div>
                <div class="modal-footer" style="background: #449D44">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- DELETE MODAL STARTS -->
    <div class="modal fade modal-danger" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete vacancy</h4>
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
@endsection