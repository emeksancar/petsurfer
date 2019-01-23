<?php
/**
 * Created by PhpStorm.
 * User: emek
 * Date: 23.01.2019
 * Time: 02:21
 */

namespace App\Repositories\Books;


use App\Book;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    public function getBooks($param)
    {
        $query = $this->model->newQuery();

        if(!empty($param['author'])){
            $query = $query->where('author', $param['author']);
        }
        if (!empty($param['category'])) {
            $query = $query->where('category', $param['category']);
        }
        if (!empty($param['name'])) {
            $query = $query->where('name', 'like', '%'.$param['name'].'%');
        }

        return $query->get();
    }
}