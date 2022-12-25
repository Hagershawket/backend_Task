<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Interfaces\CategoryInterface;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return $this->category->getAllCategories();
    }

    public function store(CategoryRequest $request)
    {
        return $this->category->storeCategory($request);
    }

    public function show(Category $category)
    {
        return $this->category->showCategory($request);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        return $this->category->updateCategory($request , $category);
    }

    public function destroy(Category $category)
    {
        return $this->category->deleteCategory($category);
    }
}
