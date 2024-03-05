@extends('layouts.app')
@section('title', 'Detail User')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@section('content')
    <h1>Detail User</h1>
    @if (session('message'))
    <div class="alert alert-success">hello{{ session('message') }}</div>
    @endif
    <div class="mt-5 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/users-approve/{{ $user->slug }}" class="btn btn-info">Approve User</a>
        @else
        <a href="/users" class="btn btn-primary">Back</a>

        @endif
    </div>
    <div class="my-5 w-25">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" value="{{ $user->username }}" readonly>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Phone:</label>
            <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Address:</label>
            <textarea name="address" id="" cols="30" rows="10" style="resize:none" class="form-control">{{ $user->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Status:</label>
            <input type="text" class="form-control" value="{{ $user->status }}" readonly>
        </div>
    </div>
@endsection
