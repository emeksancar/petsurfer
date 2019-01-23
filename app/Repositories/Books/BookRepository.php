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
        if (!empty($param['keyword'])) {
            $query = $query
                ->where('books.name', 'like', '%'.$param['keyword'].'%');
        }

        $query = $query
            ->leftJoin('categories', 'books.category', '=', 'categories.id')
            ->leftJoin('authors', 'books.author', '=', 'authors.id')
            ->select('books.*', 'categories.name as category_name', 'authors.first_name as author_first_name', 'authors.last_name as author_last_name');

        return $query->get();
    }

    public function saveBook($all)
    {
         return $this->model->create($all)->id;
    }

    public function findBook($id)
    {
        return $this->model->find($id);
    }

    public function updateBook($param)
    {
        $this->model->find($param['id'])->update($param);

        return $param['id'];
    }

    public function deleteBook($id)
    {
        $this->model->find($id)->delete();
    }
}