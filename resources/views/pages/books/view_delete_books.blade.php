@extends('layouts.app')

@section('title', "histori delete")
    
@section('content')
 
<h1>History Delete Catagori</h1>

<div class="mt-5 d-flex justify-content-end">
    <a href="/books" class="btn btn-primary">Back</a>
</div>
    <div class="my-5">
        
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->title }}</td>
                       <td>
                        <a href="/books-restore/{{ $book->slug }}" class="btn btn-warning"><i class="bi bi-aspect-ratio"></i></i></a>

                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection