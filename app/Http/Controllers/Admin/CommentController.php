<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'name' => 'required|string|between:2,100',
            'comment' => 'required|string|min:5',
        ], [], [
            'name' => 'Name',
            'comment' => 'Comment',
        ]);

        $post->comments()->create($data);
        return redirect()->route('admin.posts.show', $post)->with('success', 'Comment added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Comment $comment)
    {
        return view('admin.comments.edit', compact('post', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $data = $request->validate([
            'name' => 'required|string|between:2,100',
            'comment' => 'required|string|min:5',
        ], [], [
            'name' => 'Name',
            'comment' => 'Comment',
        ]);

        $comment->update($data);
        return redirect()->route('admin.posts.show', $post)->with('success', 'Comment #'.$comment->id.' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.posts.show', $post)->with('success', 'Comment deleted successfully.');
    }
}
