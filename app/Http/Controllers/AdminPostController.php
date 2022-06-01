<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', 'max:255', 'min:5', Rule::unique('posts', 'slug')],
            'excerpt' => ['required', 'max:2500'],
            'body' => ['required', 'max:50000'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'thumbnail' => ['image'],
            'slug' => ['required', 'max:255', 'min:5', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required', 'max:2500'],
            'body' => ['required', 'max:50000'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
