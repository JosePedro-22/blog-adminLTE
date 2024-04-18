<?php

namespace App\Http\Controllers;

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
            'message' => 'required|string|min:5',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'message' => $data['message'],
        ]);

        return back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Comment $comment)
    {
        return view('dashboard.post.comment.edit', [
            'post' => $post,
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $data = $request->validate([
            'message' => 'required|string|min:5',
        ]);

        $comment->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
