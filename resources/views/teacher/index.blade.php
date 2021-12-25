@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/datatables/css/jquery.dataTables.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Teachers Complain List</h4>
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
                            @foreach ($teachers as $data)
                                <tr>
                                    <th>{{ $incr }}</th>
                                    <td>{{ $data->stud_num }}</td>
                                    <td>{{ $data->stud_name }}</td>
                                    <td>{{ $data->offense_title }}</td>
                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('F j')}}</td>
                                    <td>
                                        <a href="#" class="badge badge-outline-primary" data-toggle="modal"
                                            data-target=".bd-example-modal-lg">Info</a>
                                    </td>
                                </tr>
                                <?php $incr++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Large modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Modal body text goes here.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
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