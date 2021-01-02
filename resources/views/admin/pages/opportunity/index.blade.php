@extends('admin.layout.main')

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data {{ $title }}</h3>
                            <a href="{{ url('admin/opportunity__add') }}" class="btn btn-sm btn-primary float-right">Add New</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Opportunity Title</th>
                                        <th>Opportunity Point Required</th>
                                        <th>Opportunity Description</th>
                                        <th>Total Opportunity</th>
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
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->point_required }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>{{ $row->other->total_opportunity }}</td>
                                            <td>
                                                <a href="{{ url('admin/opportunity__edit/'.$row->opportunity_id) }}"
                                                    onClick="alertDelete()"
                                                    class="btn btn-success btnTable">
                                                    Edit
                                                </a>
                                                <a href="{{ url('admin/opportunity__delete/'.$row->opportunity_id) }}"
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
                                        <th>Opportunity Title</th>
                                        <th>Opportunity Point Required</th>
                                        <th>Opportunity Description</th>
                                        <th>Total Opportunity</th>
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
    $('a[menu="opportunity"]').addClass('active')
    $('a[menu="opportunity-list"]').addClass('active')
</script>
@endsection
