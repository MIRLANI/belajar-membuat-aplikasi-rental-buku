<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PubliController extends Controller
{
    public function index(): Response
    {
        $books = Book::query()->get();
        return response()->view("pages.book_list", [
            "books" => $books
        ]);
    }
}
