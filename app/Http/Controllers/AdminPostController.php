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

        Post::create(array_merge(
            $this->validatePost(),
            [
                'user_id' => auth()->id(),
                'thumbnail' => request()->file('thumbnail')->store('thumbnails')
            ]
        ));

        return redirect('/');
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
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

    protected function validatePost(Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'thumbnail' => $post->exists ? ['image'] : ['image', 'required'],
            'slug' => ['required', 'max:255', 'min:5', Rule::unique('posts', 'slug')],
            'excerpt' => ['required', 'max:2500'],
            'body' => ['required', 'max:50000'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
