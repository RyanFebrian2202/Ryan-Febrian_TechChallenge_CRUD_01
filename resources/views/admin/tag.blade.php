@extends('layouts.app')

@section('judul', 'Admin | Manage Tag')

@section('style')
<link rel="stylesheet" href="{{asset('css/tag&user.css')}}">
@endsection

@section('content')
<div class="subetewa" style="background-color: #432818; padding-bottom: 50px; padding-top: 20px">
    <div class="container mt-5" style="margin-top: 0px">

        <div class="col-md-8 p-4 rounded" style="background-color:#bb9457;">
            {{-- HEADING --}}
            <div class="header">
                <h4 style="font-weight: bold">Manage Tags</h4>
                <form action="" class="search-bar">
                    <div class="search">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search Tag Name"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <hr style="width: auto">
            <a href="{{route('getCreateTag')}}">
                <button class="btn btn-sm btn-dark my-2" data-bs-toggle="modal" data-bs-target="#createGenreModal">
                    <i class="uil uil-plus-circle me-1"></i>
                    Add Tags
                </button>
            </a>

            {{-- TABLE --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td style="font-weight: bold">{{ $tag->id }}</td>
                        <td style="font-weight: bold">{{ $tag->name }}</td>
                        <td style="font-weight: bold">
                            <a href="{{ route('editTag', ['id'=>$tag->id]) }}" class="text-primary"><i
                                    class="uil uil-edit"></i> EDIT</a>
                            <form id="delete-form" action="{{route('deleteTag',['id'=>$tag->id])}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')

                                <button type="submit"
                                    style="border: none; background: none; font-weight: bold; color: rgb(201, 2, 2)">
                                    <i class="uil uil-trash-alt"> DELETE</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
