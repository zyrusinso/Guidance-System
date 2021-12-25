@extends('layouts.guidance')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success"><strong>Success!</strong> User Info Updated!</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User: {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#userInfo" data-toggle="tab" class="nav-link active show">User
                                    Info</a>
                            </li>
                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                    class="nav-link">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="userInfo" class="tab-pane fade active show">
                                <div class="pt-3">
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">User Information</h4>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $user->name }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $user->email }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <h5 class="f-w-500">Time of Register <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9"><span>{{ $user->created_at }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile-settings" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Account Setting</h4>
                                        <form method="post" action="{{ route('user.update', $user->id) }}">
                                            @csrf
                                            @method('patch')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') ?? $user->email }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="{{ old('name') ?? $user->name }}" placeholder="Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Password</label>
                                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                                    <span>
                                                        <p>Leave blank if don't want to change</p>
                                                    </span>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection