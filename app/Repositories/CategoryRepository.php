<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryInterface;
use App\Http\Resources\CategoryResource;
use App\Traits\GeneralTrait;

class CategoryRepository implements CategoryInterface{

    use GeneralTrait;

    public function getAllCategories()
    {
        $categories = CategoryResource::collection(Category::get());
        return $this->returnData('data', $categories);
    }

    public function storeCategory($request)
    {
        try{
            $category = Category::create([
                'name'   =>  $request->name,
            ]);
            return $this->returnData('data', new CategoryResource($category) , 'Data Created Successfully');
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }

    public function showCategory($category)
    {
        $category = new CategoryResource(Category::findOrFail($category));
        return $this->returnData('data', $category);
    }

    public function updateCategory($request , $category)
    {
        try{
            $category->update([
                'name'   =>  $request->name,
            ]);
            return $this->returnData('data', new CategoryResource($category));
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }

    public function deleteCategory($category)
    {
        try{
            $category->delete();
            return $this->returnSuccessMessage('Data Deleted Successfully');
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }
}
