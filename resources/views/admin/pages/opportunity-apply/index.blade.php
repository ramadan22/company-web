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
                                        <th>Opportunity Title</th>
                                        <th>User Email</th>
                                        <th>Point Received</th>
                                        <th>Point Required</th>
                                        <th>Result Of Quiz</th>
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
                                            <td>{{ $row->opportunity->title }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->point_result }}</td>
                                            <td>{{ $row->opportunity->point_required }}</td>
                                            <td>{{ $row->is_passed == 1 ? 'Passed' : 'Fail' }}</td>
                                            <td>
                                                <a href="{{ url('admin/opportunity-applied-detail/'.$row->opportunity_apply_id) }}"
                                                    class="btn btn-info">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Opportunity Title</th>
                                        <th>User Email</th>
                                        <th>Point Received</th>
                                        <th>Point Required</th>
                                        <th>Result Of Quiz</th>
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

@section("js")
<script>
    $('li[parent="opportunity"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="opportunity-applied"]').addClass('active')
    $('a[menu="opportunity"]').addClass('active')
</script>
@endsection
