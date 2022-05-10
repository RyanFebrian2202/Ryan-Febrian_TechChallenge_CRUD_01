@extends('layouts.app')

@section('judul', 'Admin | Edit Tag')

@section('style')
<link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection

@section('content')
<div class="createPage">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="form-bg col-md-6 p-4 rounded-3">
                <h1 style="font-weight: bold; display: flex; justify-content: center; align-self: center">Edit Tags</h1>
                <br>

                <form action="{{route('updateTag', ['id'=>$tag->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-weight: bold">Name</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{$tag->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div style="display: flex; justify-content: center; align-self: center;">
                        <button class=" btn btn-success p-2 px-3" type="submit" style="font-weight: bold">
                            <b>Edit</b></button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
