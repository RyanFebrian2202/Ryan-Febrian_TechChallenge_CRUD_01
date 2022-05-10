@extends('layouts.app')

@section('judul', 'Register')

@section('style')
<link rel="stylesheet" href="{{asset('css/registration.css')}}">
@endsection

@section('content')
<section id="Register">
    <div class="register-bg"></div>
    <div class="register-content">
        <div class="register-heading">
            <h1>Welcome to</h1>
            <h1 id="bottom-heading">Picture Gallery <span>!</span></h1>
        </div>
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="register-form">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="name">Full Name</label>
                    <br>
                    <input id="name" type="text" name="name">
                </div>
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="username">Username</label>
                    <br>
                    <input id="username" type="text" name="username">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="password">Password</label>
                    <br>
                    <input id="password" type="password" name="password">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="register-input">
                    <label for="confirmpassword">Confirm Password</label>
                    <br>
                    <input id="confirmpassword" type="password" name="password_confirmation">
                </div>
                <div class="register-bottom">
                    <p>Already have an account? <span><a href="{{route('getLoginPage')}}">Log in</a></span></p>
                    <button class="submitBtn" type="submit">Create Account</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
