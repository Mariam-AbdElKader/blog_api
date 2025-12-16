<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCommentRequest;
use App\Http\Requests\Admin\UpdateCommentRequest;
use App\Http\Resources\Admin\CommentResource;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function show(Comment $comment)
    {
        return $comment->toResource(CommentResource::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Post $post, Comment $comment)
    {
        $comment->update($request->validated());

        return $comment->toResource(CommentResource::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
