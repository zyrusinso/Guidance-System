<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGIN</title>
    <!-- Favicon icon -->
    <link href="{{ asset('focusAdmin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
</head>

<body>
<div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="email"
                                                autofocus>

                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" name="remember" type="checkbox" id="basic_checkbox_1"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Required vendors -->
    <script src="{{ asset('focusAdmin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focusAdmin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

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