<?php

namespace App\Http\Controllers\Client;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Client\PostResource;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::latest()->where('is_active', true)->get()->toResourceCollection(PostResource::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        abort_if(!$post->is_active, 404);
        return $post->toResource(PostResource::class);
    }
};
