@extends('admin.layout.main')

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{ url('admin/news__update/' . $data->news_id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>News Title</label>
                                <input type="text" name="news_title" value="{{ request()->old('news_title') ?? $data->news_title }}"
                                    class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>News Image</label>
                                <input style="padding:3px" type="file" name="news_image" class="form-control" />
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>News Content</label>
                                <textarea name="news_content" id="summernote" class="form-control">{{ request()->old('news_content') ?? $data->news_content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-7 offset-md-5">
                        <button type="submit" class="btn btn-sm btn-dark">Save</button>
                        <button type="button" onclick="window.location.assign('/admin/news')" class="btn btn-sm btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://adeelhussain.github.io/summernote-image-attribute-editor/summernote-image-attributes.js"></script>
<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 200,
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

    $('li[parent="sites"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="general"]').addClass('sites')
    $('a[menu="news"]').addClass('active')
</script>
@endsection
