@extends('admin.layout.main')

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data {{ $title }}</h3>
                            <a href="{{ url('admin/banner__add') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data->isEmpty())
                                        <tr>
                                            <td colspan="10" class="text-center">No Data Available</td>
                                        </tr>
                                    @else
                                        @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $row->banner_title }}</td>
                                            <td>{{ $row->banner_description }}</td>
                                            <td>
                                                @if(empty($row->banner_image))
                                                    No Image
                                                @else
                                                    <div class="wrap-image float-left">
                                                        <div class="image"><img src="{{ $row->banner_image }}" /></div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/banner__edit/'.$row->banner_id) }}"
                                                    onClick="alertDelete()"
                                                    class="btn btn-success btnTable">
                                                    Edit
                                                </a>
                                                <a href="{{ url('admin/banner__delete/'.$row->banner_id) }}"
                                                    onClick="alertDelete()"
                                                    class="btn btn-danger btnTable">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('li[parent="sites"]').addClass('nav-item menu-is-opening menu-open')
        $('a[menu="general"]').addClass('sites')
        $('a[menu="banner"]').addClass('active')
    </script>
@endsection
