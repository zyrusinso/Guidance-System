@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/datatables/css/jquery.dataTables.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Privilege</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $incr = 1; ?>
                            @foreach ($users as $data)
                                <tr>
                                    <th>{{ $incr }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <?= ($data->is_admin == 1)? 'Admin' : 'User' ?>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('user.destroy', $data->id) }}">
                                            @csrf 
                                            @method('delete')
                                            <a href="{{ route('user.show', $data->id) }}" class="badge badge-outline-primary">Edit</a>
                                            <button type="submit" class="badge badge-outline-danger">Delete</button>
                                        </form>
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