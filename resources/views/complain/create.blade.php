@extends('layouts.guidance')

@section('content')
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Complain</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" id="complainForm" action="{{ route('complain.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6" style="border-right: 1px dashed #333;">
                                <h6>Student Info</h6>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_num">Student Number<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_num" name="stud_num"
                                            placeholder="ex: 12345678910" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_fname">Student First Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_fname" name="stud_fname"
                                            placeholder="e.g Juan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_lname">Student Last Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_lname" name="stud_lname"
                                            placeholder="e.g Dela Cruz">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="phone_num">Phone Number<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="phone_num" name="phone_num"
                                            placeholder="...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="address">Address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <h6>Complain</h6>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="offense_title">Offense Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="offense_title" name="offense_title"
                                            placeholder="Student Offense">
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
                            <div class="col-lg-12 text-center mt-2">
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
        "stud_num": {
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
        "stud_num": {
            required: "Please enter a Student Number",
            digits: "Please enter only digits!",
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
                url: "{{ route('complain.store') }}",
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

    var timerid;
    $("#stud_num").on("input", function(e) {
        var value = $(this).val();
        if ($(this).data("lastval") != value) {

            $(this).data("lastval", value);
            clearTimeout(timerid);

            timerid = setTimeout(function() {
                
                if(value != ""){
                    $.ajax({
                    url: "/studentProfile/check/"+value,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    type: "POST",
                    data: {nothing: "Yess"},
                    success: function(data){
                        if(data.success){
                            $( '#stud_fname' ).val( data.data.fname );
                            $( '#stud_lname' ).val( data.data.lname );
                            $( '#email' ).val( data.data.email );
                            $( '#phone_num' ).val( data.data.phone_num );
                            $( '#address' ).val( data.data.address );
                        }
                        if(data.success == false){
                            $( '#stud_fname' ).val( "" );
                            $( '#stud_lname' ).val( "" );
                            $( '#email' ).val( "" );
                            $( '#phone_num' ).val( "" );
                            $( '#address' ).val( "" );
                        }
                    },
                }); 
                }

            }, 500);
        };
    });
});
</script>


@endsection