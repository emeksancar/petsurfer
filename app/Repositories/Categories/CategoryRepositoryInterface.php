<?php
/**
 * Created by PhpStorm.
 * User: emek
 * Date: 23.01.2019
 * Time: 12:18
 */
namespace App\Repositories\Categories;

interface CategoryRepositoryInterface {
    public function getCategories($param);
    public function saveCategory($param);
    public function findCategory($id);
    public function updateCategory($param);
    public function deleteCategory($id);
}