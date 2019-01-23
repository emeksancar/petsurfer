<?php

namespace App\Http\Controllers;

use App\Book;
use App\Repositories\Author\AuthorRepository;
use App\Repositories\Books\BookRepository;
use App\Repositories\Categories\CategoryRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct
    (
        Book $book,
        BookRepository $bookRepository,
        CategoryRepository $categoryRepository,
        AuthorRepository $authorRepository
    ){
        $this->model = $book;
        $this->repository = $bookRepository;
        $this->catRepository = $categoryRepository;
        $this->authorRepository = $authorRepository;
    }

    public function list(Request $request) {
        $cats = $this->catRepository->getCategories("");
        $authors = $this->authorRepository->getAuthors("");
        $param = $request->toArray();
        $books = $this->repository->getBooks($param);

        return view('book/books-list', compact('books', 'cats', 'authors'));
    }

    public function create() {
        $param = [];
        $cats = $this->catRepository->getCategories($param);
        $authors = $this->authorRepository->getAuthors($param);
        $route = "book.store";
        return view('book/book-create', compact('route', 'cats', 'authors'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'isbn' => 'required'
        ]);

        $all = $request->all();
        if ($this->model->isValidIsbn($all['isbn'])) {
            $id = $this->repository->saveBook($all);

            return redirect(route('book.edit', $id))->with('success', ['Kitap basariyla kaydedildi.']);
        } else {
            return back()->withErrors('errors', 'isbn yanlis');
        }
    }

    public function edit($id) {
        $cats = $this->catRepository->getCategories("");
        $authors = $this->authorRepository->getAuthors("");
        $route = "book.update";
        $book = $this->repository->findBook($id);

        return view('book/book-create', compact('route', 'book', 'cats', 'authors'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'isbn' => 'required'
        ]);

        $all = $request->all();
        if ($this->model->isValidIsbn($all['isbn'])) {
            $id = $this->repository->updateBook($all);

            return redirect(route('book.edit', $id))->with('success', ['Kitap basariyla duzenlendi.']);
        } else {
            return back()->withErrors('errors', 'isbn yanlis');
        }
    }

    public function destroy($id) {
        $this->repository->deleteBook($id);

        return redirect(route('books.list'))->with('success', ['Kitap basariyla silindi.']);
    }
}
