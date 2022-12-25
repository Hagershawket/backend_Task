<?php
namespace App\Interfaces;

interface AdInterface{

    public function showAds($advertiserId);

    public function filterByCategory($categoryId);

    public function filterByTag($tagId);

}
