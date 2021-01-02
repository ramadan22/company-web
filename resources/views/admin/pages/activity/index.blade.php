@extends('admin.layout.main')

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data {{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Who It Is</th>
                                        <th>What she/he Does</th>
                                        <th>From Where</th>
                                        <th>Detail Time</th>
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
                                            <td>{{ $row->admin_name }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>{{ $row->detail }}</td>
                                            <td>{{ date('d M, Y - H:i a', strtotime($row->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Who It Is</th>
                                        <th>What she/he Does</th>
                                        <th>From Where</th>
                                        <th>Detail Time</th>
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

@section("js")
<script>
    $('li[parent="admin"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="admin"]').addClass('active')
    $('a[menu="admin-activity"]').addClass('active')
</script>
@endsection
