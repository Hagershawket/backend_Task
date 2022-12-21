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
            return $this->returnData('data', new CategoryResource($category));
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }

    public function updateCategory($request , $category)
    {
        try{
            $updatedCategory = $category->update([
                'name'   =>  $request->name,
            ]);
            return $this->returnData('data', new CategoryResource($updatedCategory));
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }
}
