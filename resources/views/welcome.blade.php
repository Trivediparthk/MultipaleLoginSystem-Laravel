@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-10">
            <h2 class="text-center">Welcome To Our Website <b>{{Session::get('full_name')}}</b></h2>
        </div>
        <div class="col-2">
            <a href="/logout">Logout</a>
        </div>
    </div>
@endsection
