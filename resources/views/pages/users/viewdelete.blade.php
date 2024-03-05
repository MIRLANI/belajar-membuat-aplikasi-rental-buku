@extends('layouts.app')

@section('title', "histori delete")
    
@section('content')
 
<h1>History Ban User</h1>

<div class="mt-5 d-flex justify-content-end">
    <a href="/users" class="btn btn-primary">Back</a>
</div>
    <div class="my-5">
        
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->phone }}</td>
                       <td>
                        <a href="/users-restore/{{ $user->slug }}" class="btn btn-warning"><i class="bi bi-aspect-ratio"></i></i></a>

                       </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection