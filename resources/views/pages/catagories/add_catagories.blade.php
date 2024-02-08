@extends('layouts.app')

@section('title', 'Tambah catagori')


@section('content')
    <h1>Tambah Catagori</h1>

    <div class="mt-5 w-50">
        <form action="/catagories-add" method="post">
            @csrf
          
            <div>
                <label for="name" class="form-label">Name: </label>
                @error('name')
                <div class="text-danger">{{ $message }}</div> 
            @enderror
                <input type="text" name="name" id="name" placeholder="Catagori name..." class="form-control @error("name") is-invalid @enderror" value="{{ old('name') }}">
            </div>
            <div class="mt-2">
                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
            </div>

        </form>
    </div>
@endsection
