<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\Categories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Category $category, CategoryRepository $categoryRepository)
    {
        $this->model = $category;
        $this->repository = $categoryRepository;
    }

    public function list(Request $request) {
        $param = $request->toArray();
        $categories = $this->repository->getcategories($param);

        return view('category/list-category', compact('categories'));
    }

    public function create() {
        $route = "category.store";
        return view('category/category-create', compact('route'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $all = $request->all();
        $id = $this->model->create($all)->id;

        return redirect(route('category.edit', $id))->with('success', ['Kategori basariyla olusturuldu.']);
    }

    public function edit($id) {
        $route = "category.update";
        $category = $this->model->find($id);

        return view('category/category-create', compact('route', 'category'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $all = $request->all();
        $category = $this->model->find($all['id']);
        $category->update($all);

        return back()->with('success', ['Kategori basariyla duzenlendi.']);
    }

    public function destroy($id) {
        $category = $this->model->find($id);
        $category->delete();

        return redirect(route('category.list'))->with('success', ['Kategori basariyla silindi.']);
    }
}
