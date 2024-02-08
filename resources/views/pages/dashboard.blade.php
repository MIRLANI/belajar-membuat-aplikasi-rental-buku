@extends('layouts.app')

@section('title', "dashboard")


@section('content')

<h1>Welcome {{ Auth::user()->username }}</h1>

    <div class="row mt-5">
        <div class="col-lg-4 ">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc"><b>Book</b></div>
                        <div class="card-count">{{ $count_book }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card-data catagory">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-task"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc"><b>Catagori</b></div>
                        <div class="card-count">{{ $count_catagori }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="bi bi-person"></i></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc"><b>User</b></div>
                        <div class="card-count">{{ $count_user }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>#Rent Log</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User</th>
                    <th>Book Title</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection