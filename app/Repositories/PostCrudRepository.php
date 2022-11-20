<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostCrudRepository implements CrudRepository
{

    public function index()
    {
        return Post::latest()->get();
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function store()
    {
        $data = request()->only(['title', 'body']);
        $data['image'] = request('image')->store('posts');
        $data['slug'] = $this->makeSlug();
        return Auth::user()->posts()->create($data);
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        $data = request()->only(['title', 'body']);
        if (request()->has('image')) {
            if (file_exists(storage_path('app/public/posts/' . $post->image))) {
                unlink(storage_path('/posts/' . $post->image));
            }
            $data['image'] = request('image')->store('posts');
        }
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        return $post->delete();
    }

    private function makeSlug()
    {
        // it can be based upon name and unique
        return str_shuffle(Str::random() . time());
        // if want unique
        do {
            $slug = str_shuffle(Str::random() . time());
        } while(Post::where('slug', $slug)->exists());
        return $slug;
    }
}
