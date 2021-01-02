@extends('admin.layout.main')

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <form action="{{ url('admin/admin__update/' . $data->admin_id) }}" enctype="multipart/form-data" method="post">
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
                                <label>Admin Name</label>
                                <input type="text" name="admin_name" value="{{ request()->old('admin_name') ?? $data->admin_name }}"
                                class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Admin Email</label>
                                <input type="email" name="admin_email" value="{{ request()->old('admin_email') ?? $data->admin_email }}"
                                class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Admin Password</label>
                                <input type="text" name="admin_password" value="{{ request()->old('admin_password') ?? '' }}"
                                class="form-control" autocomplete="off"
                                />
                            </div>
                            <div class="form-group">
                                <label>Admin Photo</label>
                                <input style="padding:3px" type="file" name="admin_photo" class="form-control" />
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Admin Description</label>
                                <textarea name="admin_description" rows="5" cols="5" class="form-control">{{ request()->old('admin_description') ?? $data->admin_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Admin Address</label>
                                <textarea name="admin_address" rows="5" cols="5" class="form-control">{{ request()->old('admin_address') ?? $data->admin_address }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-7 offset-md-5">
                        <button type="submit" class="btn btn-sm btn-dark">Save</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                        <button type="button" onclick="window.location.assign('/admin/admin')" class="btn btn-sm btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section("js")
<script>
    $('li[parent="admin"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="admin"]').addClass('active')
    $('a[menu="admin-list"]').addClass('active')
</script>
@endsection
