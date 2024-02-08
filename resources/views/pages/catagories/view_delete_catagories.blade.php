@extends('layouts.app')

@section('title', "histori delete")
    
@section('content')
 
<h1>History Delete Catagori</h1>

<div class="mt-5 d-flex justify-content-end">
    <a href="/catagories" class="btn btn-primary">Back</a>
</div>
    <div class="my-5">
        
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
                        <a href="/catagories-restore/{{ $catagori->slug }}" class="btn btn-warning"><i class="bi bi-aspect-ratio"></i></i></a>

                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection