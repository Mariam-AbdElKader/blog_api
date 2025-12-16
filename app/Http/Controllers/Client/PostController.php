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
        return Post::latest()->get()->toResourceCollection(PostResource::class);
    }




    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post->toResource(PostResource::class);
    }

};
