<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Interfaces\TagInterface;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{

    protected $tag;
    public function __construct(TagInterface $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        return $this->tag->getAllTags();
    }

    public function store(TagRequest $request)
    {
        return $this->tag->storeTag($request);
    }

    public function show(Tag $tag)
    {
        return $this->tag->showTag($tag);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        return $this->tag->updateTag($request , $tag);
    }

    public function destroy(Tag $tag)
    {
        return $this->tag->deleteTag($tag);
    }
}
