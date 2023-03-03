@extends('backend.layouts.headerfooter')
@section ('title', 'Features')
@section('content')

    <!-- feature Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- feature Header (Page header) -->

        <section class="content-header">
            <h1>
                Features
                <small>
                    List | Add | Update | Delete Features
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-rebel"></i> Features</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div id="listfeature">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">View All Features |
                            <a href="{{ route('features.create') }}" class="btn btn-primary" title="Add New feature">
                                <i class="fa fa-plus"></i> Add feature
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
                                        <th width="40%">Features</th>
                                        {{-- <th width="40%"> Short Highlights</th> --}}
                                        <th width="40%">Description</th>
                                        <th width="">Display</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($features as $key => $feature)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>
                                            <img width="10%" class="img-thumbnail" src="{{ asset('storage/features/'.$feature->icon) }}">
                                            <b>{{ $feature->title }}</b>&nbsp;|&nbsp;
                                            <small>{{ $feature->sku }}</small>
                                            <small>
                                                <i>
                                                    @if($feature->display == 1)

                                                        <i style="color: green;" class="fa fa-eye"></i>

                                                    @else

                                                        <i style="color: red;" class="fa fa-eye-slash"></i>
                                                    @endif

                                                    @if($feature->featured == 1)

                                                        <i style="color: #a8a800;" class="fa fa-star"></i>

                                                    @endif

                                                </i>
                                            </small>

                                        </td>
                                        <td>
                                            {!!$feature->short_description!!}
                                        </td>
                                        {{-- <td>
                                            {!!$feature->long_description!!}
                                        </td> --}}

                                        <td>
                                            @if($feature->display == 1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-default">InActive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="content-right">
                                                {{-- <a href="#viewfeature"
                                                    data-toggle="modal"
                                                    data-id="{{ $feature->id }} "
                                                    data-details='{{ $feature->content }}'
                                                    data-display="{{ $feature->display }}"
                                                    id="view{{ $feature->id }}"
                                                    class="btn btn-sm btn-success"
                                                    onClick="view_content('{{$feature->id }} ','{{addslashes($feature->title) }} ','{{$feature->image }}')"><i class="fa fa-eye"></i></a> --}}

                                                <a href="{{ route('features.edit', base64_encode($feature->id)) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>


                                                <a href="#delete"
                                                   data-toggle="modal"
                                                   data-id="{{ $feature->id }}"
                                                   id="delete{{ $feature->id }}"
                                                   title="Delete"
                                                   class="btn btn-sm btn-danger"
                                                   onclick="delete_menu('{{ base64_encode($feature->id) }}')"><i class="fa fa-trash  "></i>
                                               </a>
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
                $('#viewImage').attr('src', "{{ asset('storage/Features/thumbs/thumb_') }}" + image);
            }else{
                $('#viewImage').hide();
            }
            $('#viewContents').html(content);
        }


        /*Delete Menu*/
        function delete_menu(id) {
            var conn = './features/delete/' + id;
            $('#delete a').attr("href", conn);
        }
        /*Delete Menu Ends*/

    </script>
    <!--    Initialize Multi Select   -->

    <div class="modal fade" id="viewfeature">
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
                    <h4 class="modal-title">Delete feature</h4>
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
