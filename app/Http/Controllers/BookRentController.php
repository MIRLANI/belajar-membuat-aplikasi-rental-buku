<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookRentController extends Controller
{
    public function index(): Response
    {
        return response()->view("pages.book_rent.book_rent");
    }
}
