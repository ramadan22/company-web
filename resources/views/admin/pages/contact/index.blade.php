@extends('admin.layout.main')

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card w-100">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>
                </div>
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
                            @if($data->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="10">No Data Available</td>
                                </tr>
                            @else
                                @foreach($data as $key => $row)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->contact_subject }}</td>
                                    <td>{{ $row->contact_email }}</td>
                                    <td>{{ $row->contact_message }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/contactus__delete/'.$row->contact_id) }}"
                                            onClick="alertDelete()"
                                            class="btn btn-danger btnTable">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix"></div>
            </div>
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
<script>
    $('a[class="nav-link"]').removeClass('active')
    $('li[parent="general"]').addClass('nav-item menu-is-opening menu-open')
    $('a[menu="general"]').addClass('active')
    $('a[menu="contact"]').addClass('active')
</script>
@endsection
