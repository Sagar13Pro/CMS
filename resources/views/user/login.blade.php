<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="/image/png" href="{{asset('programs/form/assets/images/icons/favicon.ico')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('programs/form/assets/css/util.css')}}">
    <script src="https://unpkg.com/feather-icons"></script>
    @extends('layouts.layout')
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter" style="background-color: #ebeeef">

        <div class="container" style="padding:20px 0px 0px 20px;background-color: #ebeeef;">
            <a href="/" style="font-size: 13px;font-weight: 600;text-transform: uppercase;letter-spacing: 1px;display: inline-block;padding: 10px 32px;border-radius: 4px;background: #F39C12; color:black;">Go to Home</a>
        </div>
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{asset('programs/form/assets/images/bg-01.jpg)')}}">
                    <span class="login100-form-title-1">
                        cms Login
                    </span>
                </div>
                <x-alert />
                <form class="login100-form" action="{{ route('user.validation') }}" method="post">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email Id<span style="color: #ff5e13;">&nbsp;*</span></span>
                        <input class="input100" type="email" name="email" placeholder="Enter Email" value="{{old('email')}}" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password<span style="color: #ff5e13;">&nbsp;*</span></span>
                        <input id="passwd" class="input100" type="password" name="pass" placeholder="Enter password" required>
                        <span class="eye-icon"><i id="eye-pass" class="fas fa-eye-slash"></i></span>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container">
                        <div class="container-login100-form-btn" style="justify-content: center;">
                            <button type="submit" class="login100-form-btn btn-margin">
                                LOGIN
                            </button>
                        </div>
                    </div>
                    <div class="w-full mt-3" style="text-align: center">OR</div>

                    <div class="w-full">
                        <button class="d-flex btn btn-outline-info" style="margin: 0 auto;">
                            <a href="{{ route('login.google') }}">
                                <span class="mx-1"><img src="{{ asset('programs/form/assets/images/google.svg') }}" alt="google-logo" width="20" height="20"></span>
                                <span>Google</span>
                            </a>
                        </button>
                    </div>

                    <div class="flex-sb-m py-3 w-full">
                        <div class="container" style="display:flex;justify-content: center;">
                            <a href="#" class="text-primary font-weight-bold text-hover">Forgotten Password?
                            </a>
                        </div>
                    </div>
                    <div class="w-full" style="border-bottom:1px solid #dadde1;"></div>
                    <div class="flex-sb-m w-full p-t-5 m-l-30" style="justify-content: center;">
                        <div>
                            Don't have an account?
                            <a href="{{ route('register.view') }}" class="text-primary font-weight-bold">
                                Sign Up
                            </a>
                        </div>
                </form>
            </div>
        </div>


        <script>
            feather.replace()

        </script>
        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/vendor/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('programs/form/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/vendor/select2/select2.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('programs/form/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/vendor/countdowntime/countdowntime.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('programs/form/assets/js/main.js')}}"></script>

</body>

</html>
