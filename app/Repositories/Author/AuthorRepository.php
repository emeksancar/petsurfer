<?php
/**
 * Created by PhpStorm.
 * User: emek
 * Date: 23.01.2019
 * Time: 03:34
 */

namespace App\Repositories\Author;


use App\Author;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function getAuthors($param)
    {
        $query = $this->model->newQuery();

        if (!empty($param['keyword'])) {
            $query = $query
                ->where('first_name', 'like', '%'.$param['keyword'].'%')
                ->orWhere('last_name', 'like', '%'.$param['keyword'].'%')
                ->orWhere('country', 'like', '%'.$param['keyword'].'%');
        }

        return $query->get();
    }

    public function findAuthor($id)
    {
        return $this->model->find($id);
    }

    public function deleteAuthor($id)
    {
        $this->model->find($id)->delete();
    }

    public function saveAuthor($param)
    {
        return $this->model->create($param)->id;
    }

    public function updateAuthor($param)
    {
        $this->model->find($param['id'])->update($param);

        return $param['id'];
    }
}