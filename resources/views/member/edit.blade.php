@extends('layouts.app')

@section('judul', 'Edit')

@section('style')
<link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection

@section('content')
<div class="createPage">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="form-bg col-md-6 p-4 rounded-3">
                <h1 style="font-weight: bold; display: flex; justify-content: center; align-self: center">Edit Picture</h1>
                <br>

                <form action="{{route('editPicture', ['id'=>$picture->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-weight: bold">Name</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{$picture->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="picture" class="form-label" style="font-weight: bold">Picture</label>
                        <input name='picture' type="file" class="form-control" id="formGroupExampleInput" value="{{$picture->picture}}">
                    </div>
                    @error('picture')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="tag" class="form-label" style="font-weight: bold">Tag</label>
                        <select class="form-control @error('tag') is-invalid @enderror" name="tag">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tag')
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
