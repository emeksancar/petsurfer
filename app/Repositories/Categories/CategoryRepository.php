<?php
/**
 * Created by PhpStorm.
 * User: emek
 * Date: 23.01.2019
 * Time: 12:19
 */

namespace App\Repositories\Categories;


use App\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getCategories($param)
    {
        $query = $this->model->newQuery();

        if (!empty($param['keyword'])) {
            $query = $query
                ->where('name', 'like', '%'.$param['keyword'].'%')
                ->orWhere('cat_desc', 'like', '%'.$param['keyword'].'%');
        }

        return $query->get();
    }

    public function findCategory($id)
    {
        return $this->model->find($id);
    }

    public function saveCategory($param)
    {
        return $this->model->create($param)->id;
    }

    public function updateCategory($param)
    {
        $this->model->find($param['id'])->update($param);

        return $param['id'];
    }

    public function deleteCategory($id)
    {
        $this->model->find($id)->delete();
    }
}