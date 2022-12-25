<?php
namespace App\Repositories;

use App\Models\Ad;
use App\Interfaces\AdInterface;
use App\Http\Resources\AdResource;
use App\Traits\GeneralTrait;

class AdRepository implements AdInterface
{
    use GeneralTrait;

    public function showAds($advertiserId)
    {
        $ads = AdResource::collection(Ad::where('user_id', $advertiserId)->get());
        return $this->returnData('data', $ads);
    }

    public function filterByCategory($categoryId)
    {
        try {
            $ads = Ad::whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            })->latest()->get();
            return $this->returnData('data', AdResource::collection($ads));
        } catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }

    public function filterByTag($tagId)
    {
        try {
            $ads = Ad::whereHas('tags', function ($query) use ($tagId) {
                $query->where('tags.id', $tagId);
            })->latest()->get();
            return $this->returnData('data', AdResource::collection($ads));
        } catch (\Exception $e) {
            return $this->returnError(404, $e->getMessage());
        }
    }
}
