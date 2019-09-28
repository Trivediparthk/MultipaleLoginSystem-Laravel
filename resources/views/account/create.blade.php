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
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="login_body">
        <div class="container mt-5">
            <div class="d-flex justify-content-center h-100">
                <div class="card login_card">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <form action="/account/add" autocomplete="off" method="POST">
                            {{csrf_field()}}
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="full_name" class="form-control" placeholder="username"
                                       required>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="tel" name="mobile" class="form-control"
                                       placeholder="Contact Number" required>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="password"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign Up" class="btn float-left login_btn text-black">
                                <div class="d-flex justify-content-center ">
                                    <span class="text-white">Already have an account?<a href="/login"
                                                                                        class="text-warning"> Log In</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
