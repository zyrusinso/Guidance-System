@extends('layouts.guidance')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Responders</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Offense</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Juan Dela Cruz</td>
                                <td><span class="badge badge-primary">2nd</span>
                                </td>
                                <td>January 22</td>
                                <td>
                                    <a href="#" class="badge badge-outline-primary">Edit</a>
                                    <a href="#" class="badge badge-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>John Doe</td>
                                <td><span class="badge badge-success">1st</span>
                                </td>
                                <td>January 30</td>
                                <td>
                                    <a href="#" class="badge badge-outline-primary">Edit</a>
                                    <a href="#" class="badge badge-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>John Cena</td>
                                <td><span class="badge badge-danger">3rd</span>
                                </td>
                                <td>January 25</td>
                                <td>
                                    <a href="#" class="badge badge-outline-primary">Edit</a>
                                    <a href="#" class="badge badge-outline-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection