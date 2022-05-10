@extends('layouts.app')

@section('judul', 'Home | Picture Gallery')

@section('style')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')

<section id="home">
    <div class="home-container">
        <div class="home-content">
            <h1>Welcome to</h1>
            <h1>Picture Gallery</h1>
        </div>
    </div>
</section>
<section id="about-us">
    <div class="about-container">
        <h1>About Us</h1>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Enim mattis sit placerat in semper sed
            volutpat cursus. Nullam ac facilisi orci tellus, vel arcu. Fermentum erat augue dui malesuada
            aliquam. Bibendum magna orci, pharetra, ultrices diam. In vivamus tristique faucibus ac. Id nec
            lectus amet facilisi dui ut sit enim. Volutpat imperdiet ultricies gravida dis aliquet vulputate
            sapien nisl netus. Sem dui, dui id donec.</p>
    </div>
</section>
<section id="products">
    <div class="products-container">
        <h1>Our Products</h1>
        <hr>
        <div class="products-cards">
            <div class="products-card">
                <div class="products-content">
                    <h2>Upload</h2>
                    <h2>01</h2>
                </div>
                <div class="products-image">
                    <img src="{{asset('images/upload.jpg')}}" alt="upload">
                </div>
            </div>
            <div class="products-card">
                <div class="products-content">
                    <h2>Search</h2>
                    <h2>02</h2>
                </div>
                <div class="products-image">
                    <img src="{{asset('images/search.jpg')}}" alt="search">
                </div>
            </div>
            <div class="products-card">
                <div class="products-content">
                    <h2>Manage</h2>
                    <h2>03</h2>
                </div>
                <div class="products-image">
                    <img src="{{asset('images/manage.png')}}" alt="manage">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact-us">
    <div class="contact-container">
        <div class="contact-heading">
            <h1>Contact Us</h1>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="contact-button">
            <a href="{{route('contactPage')}}">Lets Talk</a>
        </div>
    </div>
</section>

@endsection

