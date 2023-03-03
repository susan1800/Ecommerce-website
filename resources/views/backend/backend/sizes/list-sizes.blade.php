@extends('backend.layouts.headerfooter')
@section ('title', 'Sizes')
@section('content')

    <!-- Size Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Size Header (Page header) -->

        <section class="content-header">
            <h1>
                Sizes
                <small>
                    List | Add | Update | Delete Sizes
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-object-ungroup"></i> Sizes</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div id="listSize">
                <div class="box box-default box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">View All Sizes |  
                            <a href="#addNewSizeModal" data-toggle="modal" class="btn btn-primary" title="Add New Size">
                                <i class="fa fa-plus"></i> Add New Size
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
                                        <th width="40%">Size Name</th>
                                        <th width="">Price</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sizes as $key => $size)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>
                                            <b>{{ $size->size }} Liter</b>
                                            @if ($size->display == 1)
                                            <small class="label label-success">Displayed</small>
                                            @endif

                                        </td>
                                        
                                        <td>
                                            <b>Rs: {{ $size->price }} </b>
                                        </td>
                                        
                                        <td>
                                            <span class="content-right">
                                                <a href="#viewSize"
                                                    data-toggle="modal"
                                                    data-id="{{ $size->id }} "
                                                    data-details='{{ $size->content }}'
                                                    data-display="{{ $size->display }}"
                                                    id="view{{ $size->id }}"
                                                    class="btn btn-sm btn-success"
                                                    onClick="view_content('{{$size->id }} ','{{addslashes($size->size) }} ' , '{{$size->price}}' ,'{{$size->image }}')"><i class="fa fa-eye"></i></a>

                                                <a href="#editSizeModal" data-toggle="modal" onclick="edit_size('{{ $size->id }}','{{ $size->size }}','{{ $size->price }}' ,'{{ $size->display }}')" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                
                                                <a href="#delete"
                                                   data-toggle="modal"
                                                   data-id="{{ $size->id }}"
                                                   id="delete{{ $size->id }}"
                                                   title="Delete" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="delete_menu('{{ base64_encode($size->id) }}')"><i class="fa fa-trash  "></i>
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
        function edit_size(id, size, price , display) {

            $("#sizeId").val(id);
            $("#sizeTitle").val(size);
            $("#sizePrice").val(price);
            
            if(display == 1){
                document.getElementById("sizedisplay").checked = true;
                $("#sizedisplay").val(display);
            }
            
            
        }

        function view_content(id, title, price , image) {
            var display = $('#view' + id).attr('data-display');

            
               
                $('#viewDisplay').html('<small class="label label-success">Displayed</small>');
            

            $('#viewId').val(id);
            $('#viewTitle').html(title+" Liter");
            $('#viewPrice').html("Rs : " +price );
            if (image != '') {
                $('#viewImage').show();
                $('#viewImage').attr('src', "{{ asset('storage/sizes/thumbs/thumb_') }}" + image);
            }else{
                $('#viewImage').hide();
            }
            $('#viewContents').html(content);
        }  


        /*Delete Menu*/
        function delete_menu(id) {
            var conn = './sizes/delete/' + id;
            $('#delete a').attr("href", conn);
        }
        /*Delete Menu Ends*/
        
    </script>
    <!--    Initialize Multi Select   -->

    <div class="modal fade" id="addNewSizeModal">
        <div class="modal-dialog">
            <form action="{{ route('sizes.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Add New Size</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-text-width"></i>  Size
                                    </span>
                                    <input class="form-control" type="number" name="size" required placeholder="@eg: 1 (in liter)" value="{{ old('size') }}">
                                    
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-text-width"></i>  Price
                                    </span>
                                    
                                    <input class="form-control" type="number" name="price" required placeholder="@eg: 150 (in rs)" value="{{ old('size') }}">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        
                                        <input name="display" checked value="1" type="checkbox">
                                    </span>
                                    <input type="text" value="Display" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editSizeModal">
        <div class="modal-dialog">
            <form action="{{ route('sizes.update-size') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="sizeId">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Update Size</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-text-width"></i>  Size
                                    </span>
                                    <input id="sizeTitle" class="form-control" type="string" name="size"  required placeholder="@eg: 1 (in liter)">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-text-width"></i>  Price
                                    </span>
                                    <input id="sizePrice" class="form-control" type="string" name="price" required placeholder="@eg: 250(in rs)">
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            
                                            <input name="display"  id="sizedisplay" type="checkbox">
                                        </span>
                                        <input type="text" value="Display" class="form-control" readonly="readonly">
                                    </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    


    <div class="modal fade" id="viewSize">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #449D44">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><span id="viewTitle"></span></h4>
                    <h4 class="modal-title"><span id="viewPrice"></span></h4>
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
                    <h4 class="modal-title">Delete Size</h4>
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