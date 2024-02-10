@extends('layouts.app')

@section('title', 'book')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



@section('content')
    <h1>Book List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/books-add" class="btn btn-primary">Add Data</a>
    </div>

    <div>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Book Code</td>
                    <td>Title</td>
                    <td>Cover</td>
                    <td>Action</td>
                </tr>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->cover }}</td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square "></i></a>
                            <a href="#" onclick="alert('yakin untuk menghapus!')" class="btn btn-danger"><i
                                    class="bi bi-trash"></i></a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
            </thead>
        </table>
    </div>
@endsection
