@extends('admin.layout.main')

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{ url('admin/banner__update/' . $data->banner_id) }}" enctype="multipart/form-data" method="post">
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
                                <label>Banner Title</label>
                                <input type="text" name="banner_title" value="{{ request()->old('banner_title') ?? $data->banner_title }}"
                                    class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input style="padding:3px" type="file" name="banner_image" class="form-control" />
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner Description</label>
                                <textarea name="banner_description" rows="5" cols="5" class="form-control">{{ request()->old('banner_description') ?? $data->banner_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-7 offset-md-5">
                        <button type="submit" class="btn btn-sm btn-dark">Save</button>
                        <button type="button" onclick="window.location.assign('/admin/banner')" class="btn btn-sm btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
