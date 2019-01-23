<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function create() {
        $route = "author.store";
        return view('author-create', compact('route'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
        ]);

        $all = $request->all();

        $this->model->create($all);

        return view('author-create');
    }
}
