@extends('layouts.app')

@section('title', 'book list')

@section('content')
    <div class="my-5">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card">
                        <img src="{{ $book->cover != null ?  asset('storage/'. $book->cover) : asset('img/not foud/book-not-found.jpg') }}" class="card-img-top" draggable="false" width="30px" height="30px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->book_code }}</h5>
                            <p class="card-text">{{ $book->title }}</p>
                            <p class="card-text text-end fw-bold {{ $book->status == "in stock" ? "text-success" : "text-danger" }}">{{ $book->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
