@extends('layouts.app')

@section('title', 'Tambah Book')


@section('content')
    <h1>Tambah Book</h1>

    

    <div class="mt-5 w-50">
        <form action="/books-add" method="post" enctype="multipart/form-data">
            @csrf

            <div class="my-3">
                <label for="book_code" class="form-label">Book Code: </label>
                @error('book_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="book_code" id="book_code" placeholder="Code Book..."
                    class="form-control @error('book_code') is-invalid @enderror" value="{{ old('book_code') }}">
            </div>

            <div class="my-3">
                <label for="title" class="form-label">Title Book: </label>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="title" id="title" placeholder="Title Book..."
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            </div>

            <div class="my-3">
                <label for="image" class="form-label">Image Book </label>
                @error('imgae')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="file" name="image" id="image" placeholder="image Book..."
                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
            </div>
            <div class="mt-2">
                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
            </div>

        </form>
    </div>
@endsection
