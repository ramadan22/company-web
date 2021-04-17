@extends('admin.layout.main')

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Opportunity</label>
                            <input type="text" value="{{ $data->opportunity->title }}"
                            class="form-control" autocomplete="off" disabled
                            />
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="text" value="{{ $data->email }}"
                            class="form-control" autocomplete="off" disabled
                            />
                        </div>
                        <div class="form-group">
                            <label>Point Received</label>
                            <input type="text" value="{{ $data->point_result }}"
                            class="form-control" autocomplete="off" disabled
                            />
                        </div>
                        <div class="form-group">
                            <label>Score Status</label>
                            <input type="text" value="{{ $data->is_passed ? 'passed' : 'Failed' }}"
                            class="form-control" autocomplete="off" disabled
                            />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Document Attachment from {{ $data->email }}</label>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Filename</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($data->attachment))
                                    <tr>
                                        <td colspan="10" class="text-center">No Data Available</td>
                                    </tr>
                                @else
                                    @foreach($data->attachment as $key => $row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->original_name }}</td>
                                        <td>
                                            <a target="_self" href="{{ url('admin/opportunity-applied/download/'.$row->opportunity_attachment_id) }}"
                                                class="btn btn-info">
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Filename</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-7 offset-md-5">
                    <button type="submit" class="btn btn-sm btn-dark">Back</button>
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
