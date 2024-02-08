@extends('layouts.app')

@section('title', 'catagori')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


@section('content')
    <h1>Catagory List</h1>



    <div class="mt-5 d-flex justify-content-end">
        <a href="/catagories-delete" class="btn btn-secondary me-3">View Delete Data</a>
        <a href="/catagories-add" class="btn btn-primary">Add Data</a>
    </div>
    <div class="my-5">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($catagories as $catagori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $catagori->name }}</td>
                        <td>
                            <a href="/catagories-edit/{{ $catagori->slug }}" class="btn btn-warning"><i class="bi bi-pencil-square "></i></a>
                            <a href="/catagories-delete/{{ $catagori->slug }}" onclick="alert('yakin untuk menghapus!')" class="btn btn-danger"><i
                                    class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
