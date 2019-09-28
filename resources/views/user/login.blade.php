@extends('layouts.app')
@section('styles')
    <style>
        html, body {
            background-image: url('../images/back.jpg') !important;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }
    </style>
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('invalidEmail'))
        <div class="alert alert-danger">
            {{ session()->get('invalidEmail') }}
        </div>
    @endif
    <div class="login_body">
        <div class="container mt-5">
            <div class="d-flex justify-content-center h-100">
                <div class="card login_card">
                    <div class="card-header">
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon_login">
                            <a href="redirect/facebook"><span><i class="fa fa-facebook-square"></i></span></a>
                            <a href="redirect/google"><span><i class="fa fa-google-plus-square"></i></span></a>
                            {{--                            <span><i class="fa fa-twitter-square"></i></span>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" method="POST" action="user/validate">
                            {{csrf_field()}}
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="username" required>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="password"
                                       required>
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-right login_btn text-black">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center text-white">
                            Don't have an account?<a href="account/create">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
