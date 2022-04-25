@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Teacher Complain</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" id="complainForm" action="{{ route('teacher.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <!-- <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_num">Student Number<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_num" name="stud_num"
                                            placeholder="ex: 12345678910">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="teacher_name">Teacher Full Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="teacher_name" name="teacher_name"
                                            placeholder="e.g Juan Dela Cruz">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="offense_title">Offense Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="offense_title" name="offense_title"
                                            placeholder="Teacher Offense">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label" for="offense_desc">Offense Description <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="offense_desc" name="offense_desc" rows="5"
                                            placeholder="Description of Offense"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
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
        "teacher_Name": {
            required: !0,
            digits: !0
        },
        "stud_name": {
            required: !0,
            minlength: 5
        },
        "offense_title": {
            required: !0,
            minlength: 3
        },
        "offense_desc": {
            required: !0,
            minlength: 5
        },
    },
    messages: {
        "teacher_name": {
            required: "Please enter a Teacher Name",
        },
        "stud_name": {
            required: "Please enter a Student Name",
            minlength: "Student Name must consist of at least 5 characters"
        },
        "offense_title": {
            required: "Please enter a Offense Title",
            minlength: "Offense Title must consist of at least 3 characters"
        }
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
    $('#complainForm').on('submit', function(e) {

        var $form = $(this);

        e.preventDefault();

        if (!$(".is-invalid")[0]) {
            $.ajax({
                url: "{{ route('teacher.store') }}",
                dataType: "json",
                type: "POST",
                data: $form.serialize(),
                success: function(data) {
                    if (data.success) {
                        Swal.fire(
                            'Success!',
                            'Your complain are submitted',
                            'success'
                        ).then(function() {
                            window.location = window.location.pathname;
                        });
                    }
                },
            });
        }

    });
});
</script>

@endsection