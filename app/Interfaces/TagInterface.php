<?php
namespace App\Interfaces;

interface TagInterface{

    public function getAllTags();

    public function storeTag($request);

    public function showTag($tag);

    public function updateTag($request , $tag);

    public function deleteTag($tag);
}
