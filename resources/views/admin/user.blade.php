@extends('layouts.app')

@section('judul', 'Admin | Manage User')

@section('style')
<link rel="stylesheet" href="{{asset('css/tag&user.css')}}">
@endsection

@section('content')
<div class="subetewa" style="background-color: #432818; padding-bottom: 50px; padding-top: 20px">
    <div class="container mt-5" style="margin-top: 0px">

        <div class="col-md-10 p-4 rounded" style="background-color:#bb9457;">
            {{-- HEADING --}}
            <div class="header">
                <h4 style="font-weight: bold">Manage Users</h4>
                <form action="" class="search-bar">
                    <div class="search">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search Username"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <hr style="width: auto">

            {{-- TABLE --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Ban</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td style="font-weight: bold">{{ $user->id }}</td>
                        <td style="font-weight: bold">{{ $user->name }}</td>
                        <td style="font-weight: bold">{{ $user->username }}</td>
                        <td style="font-weight: bold">{{ $user->role }}</td>
                        @if($user->id == 1)
                            <td style="font-weight: bold">NO!</td>
                        @else
                            <td style="font-weight: bold">
                                <form id="delete-form" action="{{route('deleteUser',['id'=>$user->id])}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        style="border: none; background: none; font-weight: bold; color: rgb(201, 2, 2)">
                                        <i class="uil uil-trash-alt"> BAN</i>
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
