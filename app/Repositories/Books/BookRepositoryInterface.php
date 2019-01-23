<?php

namespace App\Repositories\Books;
/**
 * Created by PhpStorm.
 * User: emek
 * Date: 23.01.2019
 * Time: 02:18
 */
interface BookRepositoryInterface {
    public function getBooks($param);
    public function saveBook($param);
    public function findBook($id);
    public function updateBook($param);
    public function deleteBook($id);
}