<?php
namespace App\Repositories;

use App\Models\Tag;
use App\Interfaces\TagInterface;
use App\Http\Resources\TagResource;
use App\Traits\GeneralTrait;

class TagRepository implements TagInterface
{
    use GeneralTrait;

    public function getAllTags()
    {
        $tags = TagResource::collection(Tag::get());
        return $this->returnData('data', $tags);
    }

    public function storeTag($request)
    {
        try{
            $tag = Tag::create([
                'name'   =>  $request->name,
            ]);
            return $this->returnData('data', new TagResource($tag));
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }

    public function showTag($tag)
    {
        $tag = new TagResource(Tag::findOrFail($tag));
        return $this->returnData('data', $tag);
    }

    public function updateTag($request , $Tag)
    {
        try{
            $updatedTag = $Tag->update([
                'name'   =>  $request->name,
            ]);
            return $this->returnData('data', new TagResource($updatedTag));
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }

    public function deleteTag($tag)
    {
        try{
            $tag->delete();
            return $this->returnSuccessMessage('Data Deleted Successfully');
        }catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }
}
