<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Catagori;
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
        $catagories = Catagori::query()->get();
        return response()->view("pages.books.add_book", [
            "catagories" => $catagories
        ]);
    }

    public function store(BookRequest $bookRequest): RedirectResponse
    {
        $name = "";
        if ($bookRequest->file("image")) {
            $extension = $bookRequest->file("image")->getClientOriginalExtension();
            // $name = uniqid() . "." . $extension;
            // bisa juga seperti ini 

            $name = $bookRequest->input("title") . "-" . now()->timestamp . "." . $extension;
            // memasukan datanya kedalam direkotri public
            $bookRequest->file("image")->storeAs("public", $name);
        }
        // kemudian kita masukan ke dalam database menggunakan merge
        $bookRequest->merge(["cover" => $name]);

        $book =  Book::query()->create($bookRequest->all());
        $book->catagories()->sync($bookRequest->input("catagories"));
        return redirect("/books")->with("message", "Add Book Successfully");
    }

    public function edit(string $slug): Response
    {
        $book = Book::query()->where("slug", $slug)->first();
        $catagories = Catagori::query()->get();
        return response()->view("pages.books.edit-book", [
            "book" => $book,
            "catagories" => $catagories
        ]);
    }

    public function update(string $slug, Request $bookRequest): RedirectResponse
    {
    
        if ($bookRequest->file("image")) {
            $extension = $bookRequest->file("image")->getClientOriginalExtension();
            // $name = uniqid() . "." . $extension;
            // bisa juga seperti ini 

            $name = $bookRequest->input("title") . "-" . now()->timestamp . "." . $extension;
            // memasukan datanya kedalam direkotri public
            $bookRequest->file("image")->storeAs("public", $name);
            // kemudian kita masukan ke dalam database menggunakan merge
            $bookRequest->merge(["cover" => $name]);
        }

        $book = Book::query()->where("slug", $slug)->first();
        $book->update($bookRequest->all());

        if ($bookRequest->input("catagories")) {
            
            $book->catagories()->sync($bookRequest->input("catagories"));
        }
        return redirect("/books")->with("message", "Update Book Successfully");
    }

    public function delete(string $slug):RedirectResponse
    {
        $book = Book::query()->where("slug", $slug)->first();
        $book->delete();
        return redirect("/books")->with("message", "Delete Book Successfully");
    }

    public function viewdelete(): Response
    {
        $books = Book::onlyTrashed()->get();
        return response()->view("pages.books.view_delete_books", [
            "books" => $books
        ]);
    }

    public function restore(string $slug):RedirectResponse
    {
        $book = Book::withTrashed()->where("slug", $slug)->first();
        $book->restore();
        return response()->redirectTo("/books")->with("message", "Restore Book Successfully");
    }
}
