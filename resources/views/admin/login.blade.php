<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ورود به پنل مدیریت </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-assets/images/favicon.png')}}">
    <link href="{{asset('admin-assets/css/toastr.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/rtl.css')}}" rel="stylesheet">

</head>
<?php 
  if(Auth::user() && Auth::user()->role === 'admin'){
    return redirect()->route('admin.dashboard');
  }
?>
<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">ورود به حساب کاربری</h4>
                                    <form method="post" action="{{route('admin.login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>نام کاربری</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>رمز عبور</strong></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check mr-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">مرا به خاطر داشته باش</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">فراموشی رمز عبور</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">ورود</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                                    </div> -->
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
    <script src="{{asset('admin-assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/quixnav-init.js')}}"></script>
    <script src="{{asset('admin-assets/js/toastr.js')}}"></script>
    <script src="{{asset('admin-assets/js/custom.min.js')}}"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>

</body>

</html>