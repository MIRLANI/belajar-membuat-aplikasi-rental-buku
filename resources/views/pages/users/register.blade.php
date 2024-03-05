@extends('layouts.app')
@section('title', "user register")
@section('content')
<h1>User Register</h1>
<div class="mt-5 d-flex justify-content-end">
    <a href="/users" class="btn btn-primary">Back</a>
</div>
<div class="my-5">
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
            @foreach ($registers as $register)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $register->username }}</td>
                    <td>{{ $register->phone ?? '-' }}</td>
                    <td>
                        <a href="/users-detail/{{ $register->slug }}" class="btn btn-primary "><i class="bi bi-info-square"></i></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

