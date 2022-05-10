@extends('layouts.app')

@section('judul', 'Contact Us')

@section('style')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@section('content')
<div class="contact-us">
    <div class="contact-container">
        <div class="contact-heading">
            <h1>Contact Us</h1>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="contact-form">
            <form id="Form" onsubmit="validate()" action="{{route('sendEmail')}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-bg">
                    <div class="contact-input">
                        <label for="email">Email</label>
                        <input id='email' type="email" name="email" placeholder="Email" required>
                    </div>
                    @error('email')
                    <div class="alert alert-danger form-group col-md-6 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="contact-input">
                        <label for="subject">Subject</label>
                        <input id="subject" type="text" name="subject" placeholder="Subject" required>
                    </div>
                    @error('subject')
                    <div class="alert alert-danger form-group col-md-6 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="contact-input">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="2" required></textarea>
                    </div>
                    @error('message')
                    <div class="alert alert-danger form-group col-md-6 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="contact-button">
                        <button class="submitBtn" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
