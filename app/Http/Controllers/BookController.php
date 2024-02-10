<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index(): Response
    {
        $books = Book::query()->get();
        return response()->view("pages.books.book", ["books" => $books]);
    }

    public function add(): Response
    {
        return response()->view("pages.books.add_book");
    }

    public function store(BookRequest $bookRequest): RedirectResponse
    {

        $name = "";
        if ($bookRequest->file("image")) {
            $extension = $bookRequest->file("image")->getClientOriginalExtension();
            // $name = uniqid() . "." . $extension;
            // bisa juga seperti ini 

            $name = $bookRequest->input("title") . "-" . now()->timestamp .".". $extension;
            // memasukan datanya kedalam direkotri public
            $bookRequest->file("image")->storeAs("public", $name);
        }
        // kemudian kita masukan ke dalam database menggunakan merge
        $bookRequest->merge(["cover" => $name]);

        Book::query()->create($bookRequest->all());
        return redirect("/books")->with("message", "Add Book Successfully");
    }
}
