<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreCommentRequest;
use App\Http\Resources\Client\CommentResource;
use App\Models\Post;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return $post->comments()->latest()->get()->toResourceCollection(CommentResource::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        $comment = $post->comments()->create($request->validated());

        return $comment->toResource(CommentResource::class);
    }
}
