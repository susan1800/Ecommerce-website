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
                <li class="active"><i class="fa fa-rebel"></i> Contents</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div id="listContent">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">View All Contents |  
                            <a href="{{ route('contents.create') }}" class="btn btn-primary" title="Add New Content">
                                <i class="fa fa-plus"></i> Add Content
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
                                        <th class="text-center" width="4%">SN.</th>
                                        <th width="40%">Title</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contents as $key => $content)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>
                                            
                                            <b>{{ $content->title }}</b>

                                        </td>
                                        
                                        
                                        <td>
                                            <span class="content-right">
                                                <a href="#viewContent"
                                                    data-toggle="modal"
                                                    data-id="{{ $content->id }} "
                                                    data-content='{{ addslashes($content->description) }}'
                                                    id="view{{ $content->id }}"
                                                    class="btn btn-sm btn-success"
                                                    onClick="view_content('{{$content->id }}','{{$content->title }}')"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('contents.edit', base64_encode($content->id)) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                
                                                {{-- <a href="#delete"
                                                   data-toggle="modal"
                                                   data-id="{{ $content->id }}"
                                                   id="delete{{ $content->id }}"
                                                   title="Delete" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="delete_menu('{{ base64_encode($content->id) }}')"><i class="fa fa-trash  "></i>
                                               </a> --}}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
        function view_content(id,title) {
            var content = $('#view' + id).attr('data-content');

            $('#viewId').val(id);
            $('#viewTitle').html(title);
            $('#viewContents').html(content);
        }  


        /*Delete Menu*/
        function delete_menu(id) {
            var conn = './contents/delete/' + id;
            $('#delete a').attr("href", conn);
        }
        /*Delete Menu Ends*/
        
    </script>
    <!--    Initialize Multi Select   -->

    <div class="modal fade" id="viewContent">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #449D44">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><span id="viewTitle"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row" >
                        <div class="col-md-12">
                            <span id="viewContents"></span>
                        </div>
                        
                    </div>
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
                    <h4 class="modal-title">Delete Content</h4>
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