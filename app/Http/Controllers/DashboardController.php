<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catagori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        $countCatagori = Catagori::query()->count();
        $countBook = Book::query()->count();
        $countUser = User::query()->count();
        return response()->view("pages.dashboard", [
            "count_user" => $countUser,
            "count_book" => $countBook,
            "count_catagori" => $countCatagori
        ]);
    }
}
