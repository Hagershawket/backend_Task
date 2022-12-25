<?php
namespace App\Interfaces;

interface CategoryInterface{

    public function getAllCategories();

    public function storeCategory($request);

    public function showCategory($category);

    public function updateCategory($request , $category);

    public function deleteCategory($category);

}

