@extends('layouts.app')

@section('title', 'Tambah catagori')


@section('content')
    <h1>Update Catagori</h1>

    <div class="mt-5 w-50">
        <form action="/catagories-edit/{{ isset($catagori->slug) ? $catagori->slug  : "not/found" }}" method="post">
            @csrf

            <div>
                <label for="name" class="form-label">Name: </label>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="name" id="name" placeholder="Catagori name..."
                    class="form-control @error('name') is-invalid @enderror" value="{{ isset($catagori->name) ? $catagori->name: ""  }}">
            </div>
            <div class="mt-2">
                <button type="submit" name="tambah" class="btn btn-success">Update</button>
            </div>

        </form>
    </div>
@endsection
