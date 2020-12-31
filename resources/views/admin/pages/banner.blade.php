@extends('admin/index')

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section("content")
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Banner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Banner</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title" style="float: left;">Data</h3>
                        <button class="btn btn-primary btnTable" style="float: right;" data-toggle="modal" data-target="#modal-add">Add Data</button>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created Date</th>
                                <th>Update Date</th>
                                <th style="width: 40px"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ (strlen(strip_tags($row->description)) > 40) ? substr(strip_tags($row->description), 0, 40)."..." : strip_tags($row->description) }}</td>
                                        <td>
                                            <div class="wrap-image">
                                                <div class="image">
                                                    <img src="{{ url('')."/".$row->img_banner }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $row->created_date }}</td>
                                        <td>{{ $row->updated_date }}</td>
                                        <td style="width: 185px; text-align: center;">
                                            <button class="btn btn-info btnTable" onClick="editData('{{ $row->id_banner }}')" style="float: left;">Edit</button>
                                            <span style="float: left;">&nbsp; | &nbsp;</span>
                                            <a href="{{ url('admin/banner__delete/'.$row->id_banner) }}" class="btn btn-danger btnTable" style="float: left;" onClick="alertDelete()">Delete</a>
                                            <div class="clearfix"></div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix"></div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

    <div id="modal-add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form action="{{ url('/admin/banner__add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title w-full">Add Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-2">
                            <div class="col-sm-6">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required />
                            </div>
                            <div class="col-sm-6">
                                <label for="image">Image</label>
                                <input type="file" name="img_banner" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-sm-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="modal-edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="{{ url('admin/banner__edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" />
                    <input type="hidden" name="old_image" />
                    <div class="modal-header">
                        <h4 class="modal-title w-full">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-2">
                            <div class="col-sm-6">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required />
                            </div>
                            <div class="col-sm-6">
                                <label for="image">Change Image</label>
                                <input type="file" name="img_banner" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-sm-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section("js")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://adeelhussain.github.io/summernote-image-attribute-editor/summernote-image-attributes.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });

            // $('#summernote').summernote({
            //     tabsize: 2,
            //     height: 100,
            //     callbacks: {
            //         onMediaDelete : function($target, editor, $editable) {
            //             // alert($target[0].src); // img

            //             // remove element in editor
            //             $target.remove();
            //         }
            //     },
            //     imageAttributes: {
            //         icon: '<i class="note-icon-pencil"/>',
            //         figureClass: 'figureClass',
            //         figcaptionClass: 'captionClass',
            //         captionText: 'Caption Goes Here.',
            //         manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
            //     }
            // });

            // $('#summernote2').summernote({
            //     tabsize: 2,
            //     height: 100,
            //     callbacks: {
            //         onMediaDelete : function($target, editor, $editable) {
            //             // alert($target[0].src); // img

            //             // remove element in editor
            //             $target.remove();
            //         }
            //     },
            //     imageAttributes: {
            //         icon: '<i class="note-icon-pencil"/>',
            //         figureClass: 'figureClass',
            //         figcaptionClass: 'captionClass',
            //         captionText: 'Caption Goes Here.',
            //         manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
            //     }
            // });
        });

        function editData(id){
            $.ajax({
                url: "{{ url('admin/banner/get-edit') }}",
                type: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",
                beforeSend: function(){

                },
                success: function(response){
                    // console.log(response);
                    $("#modal-edit input[name='id']").val(response.id_banner);
                    $("#modal-edit input[name='title']").val(response.title);
                    $("#modal-edit textarea[name='description']").html(response.description);
                    $("#modal-edit input[name='old_image']").val(response.img_banner);
                    $("#modal-edit").modal("show");
                },
                error: function(){

                }
            });
        }

        function alertDelete() {
            confirm("Are you sure you want to delete this data?");
        }
    </script>
@endsection

@section("js")
    <script>
        function alertDelete() {
            confirm("Are you sure you want to delete this data?");
        }
    </script>
@endsection
