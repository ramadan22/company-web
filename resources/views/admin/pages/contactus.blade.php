@extends('admin/index')

@section("content")
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Contact Us</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
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
                        <h3 class="card-title">Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Subject</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created Date</th>
                                <th>Update Date</th>
                                <th style="width: 40px"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->subject }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->message }}</td>
                                        <td>{{ $row->created_date }}</td>
                                        <td>{{ $row->updated_date }}</td>
                                        <td>
                                            <a href="{{ url('admin/contactus__delete/'.$row->id_contactus) }}" onClick="alertDelete()" class="btn btn-danger btnTable">Delete</a>
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
@endsection

@section("js")
    <script>
        function alertDelete() {
            confirm("Are you sure you want to delete this data?");
        }
    </script>
@endsection
