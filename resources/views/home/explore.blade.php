@extends('layouts.app')

@section('judul', 'Explore')

@section('style')
<link rel="stylesheet" href="{{asset('css/explore.css')}}">
@endsection

@section('content')
<div class="home-container mt-5">

    {{-- MENU BAR --}}
    <header>
        <h2 style="font-weight: bold">Explore</h2>
    </header>
    <div class="header-hr">
        <hr>
    </div>
    <br><br>

    <section id="view-picture">
        <div class="header">
            <h2>Pictures</h2>
            <form action="" class="search-bar">
                <div class="search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search Picture Name"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="row">
            <div class="container">
                @if ($pictures->count() == 0)
                    <div class="alert alert-warning">
                        Still Empty
                    </div>
                @endif
                <div class="row">
                    @foreach ($pictures as $picture)
                    <div class="col-md-3 mb-5">
                        <div class="card col-md-12 tea-content bg-light p-2">
                            <h3 class="judul" style="font-weight: bold">{{$picture->name}}</h3>
                            <img class="picture-image" src="{{asset('storage/pictures/'.$picture->picture)}}" alt="">
                            <span class="text-muted">{{ $picture->user->username }}</span>
                            <span class="badge bg-warning">{{ $picture->tag->name }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
