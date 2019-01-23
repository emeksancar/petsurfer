<?php
namespace App\Repositories\Author;
/**
 * Created by PhpStorm.
 * User: emek
 * Date: 23.01.2019
 * Time: 02:18
 */
interface AuthorRepositoryInterface {
    public function getAuthors($param);
    public function saveAuthor($param);
    public function findAuthor($id);
    public function updateAuthor($param);
    public function deleteAuthor($id);
}