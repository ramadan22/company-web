@extends('admin.layout.main')

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section("content")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title">Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @if(!$data)
                                    <tr>
                                        <td colspan="10">No Data Found</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{!! $data->about_content ?? '' !!}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-right mt-5">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modal-edit">
                                @if(!$data)
                                    <span>Create</span>
                                @else
                                    <span>Edit</span>
                                @endif
                            </button>
                        </div>
                    </div>
                    <div class="card-footer clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ url('admin/aboutus__edit') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title w-full">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <textarea id="summernote" name="content" required>{!! $data->about_content ?? '' !!}</textarea>
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
            $('#summernote').summernote({
                tabsize: 2,
                height: 100,
                callbacks: {
                    onMediaDelete : function($target, editor, $editable) {
                        $target.remove();
                    }
                },
                imageAttributes: {
                    icon: '<i class="note-icon-pencil"/>',
                    figureClass: 'figureClass',
                    figcaptionClass: 'captionClass',
                    captionText: 'Caption Goes Here.',
                    manageAspectRatio: true
                }
            });
        });
    </script>
@endsection
