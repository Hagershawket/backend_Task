<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\AdInterface;

class AdController extends Controller
{
    protected $ad;

    public function __construct(AdInterface $ad)
    {
        $this->ad = $ad;
    }

    public function showAds($advertiserId)
    {
        return $this->ad->showAds($advertiserId);
    }

    public function filterByCategory($categoryId)
    {
        return $this->ad->filterByCategory($categoryId);
    }

    public function filterByTag($tagId)
    {
        return $this->ad->filterByTag($tagId);
    }
}
