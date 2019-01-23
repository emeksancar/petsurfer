<?php

namespace App\Http\Controllers;

use App\Repositories\Books\BookRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct(BookRepository $book)
    {
        $this->book = $book;
    }

    public function list(Request $request) {
        $param = $request->toArray();
        $books = $this->book->getBooks($param);

        return view('books-list', compact('books'));
    }
}
