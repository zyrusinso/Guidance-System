@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create User</h4>
            </div>
            
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                    class="nav-link active show">Create Form</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="profile-settings" class="tab-pane fade active show">
                                <div class="pt-3">
                                    <div class="form-validation">
                                        <form method="post" action="{{ route('user.store') }}" class="form-valide" id="userCreateForm">
                                        @csrf
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="name">Name
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="email">Email <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter valid email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="password">Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one..">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="confirm-password">Confirm Password <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password!">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="previlege">Previlege
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="previlege" name="is_admin">
                                                            <option value="">User</option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
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

@section('script')

<script src="{{ asset('focusAdmin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script>
jQuery(".form-valide").validate({
    rules: {
        "name": {
            required: !0,
            minlength: 3
        },
        "email": {
            required: !0,
            email: !0
        },
        "password": {
            required: !0,
            minlength: 5
        },
        "confirm-password": {
            required: !0,
            equalTo: "#password"
        },
    },
    messages: {
        "name": {
            required: "Please enter a name",
            minlength: "Your name must consist of at least 3 characters"
        },
        "email": "Please enter a valid email address",
        "password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        "confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});
</script>

<script src="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
$(function() {
    //Order Request
    $('#userCreateForm').on('submit', function(e) {

        var $form = $(this);

        e.preventDefault();

        if (!$(".is-invalid")[0]) {
            $.ajax({
                url: "{{ route('user.store') }}",
                dataType: "json",
                type: "POST",
                data: $form.serialize(),
                success: function(data) {
                alert("Okay naman")
                    
                    if (data.success == true) {
                        Swal.fire(
                            'Success!',
                            'User has been created!',
                            'success'
                        ).then(function() {
                            window.location = window.location.pathname;
                        });
                    }
                    if(data.success == false){
                        Swal.fire({
                            title: 'Error!',
                            html: '<div class="alert alert-danger" style="max-width: 100%; color: white;"> <?php 
                                foreach($errors->all() as $error){
                                    echo '•'.$error.'<br />';
                                }
                            ?></div>',
                            icon: 'error'
                        });
                    }
                },
            });
        }

    });
});
</script>

@endsection