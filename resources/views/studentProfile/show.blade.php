@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/datatables/css/jquery.dataTables.min.css') }}">
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('studentProfile.index') }}">Students</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{ $student->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <h4>School Info</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">School Name</h6>
                            <span class="text-secondary">{{ $student->school_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Course</h6>
                            <span class="text-secondary">{{ $student->course }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Year Level</h6>
                            <span class="text-secondary">{{ $student->yr_lvl }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Section</h6>
                            <span class="text-secondary">{{ $student->section }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Student Number</h6>
                            <span class="text-secondary">{{ $student->stud_num }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>Personal Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->fname }} {{ $student->lname }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->phone_num }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Parents Mobile Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->parent_num }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{ $student->address }}
                            </div>
                        </div>
                        <!-- <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info" href="#" data-toggle="modal" data-target="editProfileModal">Edit</a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Offense History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Offense</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $increment = 0; ?>
                                            @foreach ($offenseHistories as $item)
                                                <tr>
                                                    <th>{{ ++$increment }}</th>
                                                    <td><span class="badge {{ $offenseBagde[$increment] }}">{{ $increment }}</span></td>
                                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format("F j, Y, g:i a") }}</td>
                                                    <td>
                                                        <a href="#" class="badge badge-outline-primary" data-toggle="modal"
                                                            data-target="#modalData{{ $item->id }}">Info</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $increment = 0; ?>
        @foreach ($offenseHistories as $item)
        <div class="modal fade bd-example-modal-lg" id="modalData{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Teacher Complain Information</h5>
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
                                                <h5 class="f-w-500">Offense Attempt<span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="">
                                            <span class="badge {{ $offenseBagde[++$increment] }}">{{ $increment }}</span>
                                            </div>
                                        </div>
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

        
        <script>
            function editEmit(){
                window.Livewire.emit('editEmit');
            }
        </script>

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