<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <!-- Favicon icon -->
    <link href="{{ asset('focusAdmin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Name</strong></label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="ex: hello@example.com" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" value="">
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Confirm Password</strong></label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary"
                                                href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('focusAdmin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focusAdmin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <!--endRemoveIf(production)-->

    @if (count($errors) > 0)
        <script>
        Swal.fire({
            title: "Error!",
            html: '<div class="alert alert-danger" style="max-width: 100%; color: white;"> <?php 
                    foreach($errors->all() as $error){
                        echo '•'.$error.'<br />';
                    }
                ?></div>',
        });
        </script>
    @endif
</body>

</html>