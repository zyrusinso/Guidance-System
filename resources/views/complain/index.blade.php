@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/datatables/css/jquery.dataTables.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Complains List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Number</th>
                                <th>Student Full Name</th>
                                <th>Offense</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $incr = 1; ?>
                            @foreach ($complains as $data)
                                <tr>
                                    <th>{{ $incr }}</th>
                                    <td>{{ $data->stud_num }}</td>
                                    <td>{{ $data->stud_name }}</td>
                                    <td>{{ $data->offense_title }}</td>
                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('F j')}}</td>
                                    <td>
                                        <a href="#" class="badge badge-outline-primary" data-toggle="modal"
                                            data-target="#modalData{{ $data->id }}">Info</a>
                                    </td>
                                </tr>
                                <?php $incr++; ?>
                                
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($complains as $item)
                        <div class="modal fade bd-example-modal-lg" id="modalData{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Complain Information</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="userInfo" class="tab-pane fade active show">
                                                <div class="pt-3">
                                                    <div class="profile-personal-info">
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Student Number <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="">
                                                                <span>{{ $item->stud_num }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Student Name <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="">
                                                                <span>{{ $item->stud_name }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Offense Title<span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="">
                                                                <span>{{ $item->offense_title }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Offense Description<span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="">
                                                                <span>{{ $item->offense_desc }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Date<span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="font-weight-bold">
                                                                <span>{{ \Carbon\Carbon::parse($item->created_at)->format("F j, Y, g:i a") }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Large modal -->
    
</div>

@endsection

@section('script')
<script src="{{ asset('focusAdmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
@endsection