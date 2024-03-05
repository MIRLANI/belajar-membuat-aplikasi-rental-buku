<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::query()->insert([
            "book_code" => "A001",
            "title" => "book title",
            "cover" => "book cover",
            "slug" => "book-title",
           
            "book_code" => "A002",
            "title" => "Book Title 2",
            "cover" => "Book Cover 2",
            "slug" => "book-title-2",

            "book_code" => "A003",
            "title" => "Book Title 3",
            "cover" => "Book Cover 3",
            "slug" => "book-title-3",
            "book_code" => "A004",
            "title" => "Book Title 4",
            "cover" => "Book Cover 4",
            "slug" => "book-title-4",

            "book_code" => "A005",
            "title" => "Book Title 5",
            "cover" => "Book Cover 5",
            "slug" => "book-title-5",

            "book_code" => "A006",
            "title" => "Book Title 6",
            "cover" => "Book Cover 6",
            "slug" => "book-title-6",

            "book_code" => "A007",
            "title" => "Book Title 7",
            "cover" => "Book Cover 7",
            "slug" => "book-title-7",

            "book_code" => "A008",
            "title" => "Book Title 8",
            "cover" => "Book Cover 8",
            "slug" => "book-title-8",
            "book_code" => "A009",
            
            "title" => "Book Title 9",
            "cover" => "Book Cover 9",
            "slug" => "book-title-9",
            
            "book_code" => "A0010",
            "title" => "Book Title 10",
            "cover" => "Book Cover 10",
            "slug" => "book-titl",
        ]);
    }
}
