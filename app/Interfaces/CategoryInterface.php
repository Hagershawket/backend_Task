<?php
namespace App\Interfaces;

interface CategoryInterface{

    public function getAllCategories();

    public function storeCategory($request);

    public function updateCategory($request , $category);

    public function deleteCategory($request);

}

