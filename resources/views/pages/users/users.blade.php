@extends('layouts.app')

@section('title', 'user')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


@section('content')
    <h1>User List</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="/users-ban" class="btn btn-secondary me-3">View Ban User</a>
        <a href="/users-register" class="btn btn-primary">New Register User</a>
    </div>
    <div class="my-5">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        
                        <td>
                            <a href="/users-detail/{{ $user->slug }}" class="btn btn-primary "><i class="bi bi-info-square"></i></i></a>
                            <a href="/users-ban/{{ $user->slug }}" class="btn btn-warning" onclick="alert('yakin untuk ban user {{ $user->username }}!')"><i class="bi bi-ban"></i></a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
