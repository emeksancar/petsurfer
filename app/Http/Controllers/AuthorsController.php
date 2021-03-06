<?php

namespace App\Http\Controllers;

use App\Author;
use App\Repositories\Author\AuthorRepository;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function __construct(Author $author, AuthorRepository $authorRepository)
    {
        $this->model = $author;
        $this->repository = $authorRepository;
    }

    public function list(Request $request) {
        $param = $request->toArray();
        $authors = $this->repository->getAuthors($param);

        return view('author/list-author', compact('authors'));
    }

    public function create() {
        $route = "author.store";
        return view('author/author-create', compact('route'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
        ]);

        $all = $request->all();
        $id = $this->repository->saveAuthor($all);

        return redirect(route('author.edit', $id))->with('success', ['Yazar basariyla kaydedildi.']);
    }

    public function edit($id) {
        $route = "author.update";
        $author = $this->repository->findAuthor($id);

        return view('author/author-create', compact('route', 'author'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'id' => 'required',
        ]);

        $all = $request->all();
        $this->repository->updateAuthor($all);

        return back()->with('success', ['Yazar basariyla duzenlendi.']);
    }

    public function destroy($id) {
        $this->repository->deleteAuthor($id);

        return redirect(route('author.list'))->with('success', ['Yazar basariyla silindi.']);
    }
}
