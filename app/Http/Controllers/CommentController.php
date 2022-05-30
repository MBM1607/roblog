<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        // Create the user
        request()->validate([
            'body' => ['required', 'max:2500']
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Your comment has been posted.');
    }
}
