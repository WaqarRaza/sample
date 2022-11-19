<?php

namespace App\Http\Repositories;

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
        $file = request()->file('image');
        $file_name = Str::random() . time() . "." . $file->clientExtension();
        $file->move(storage_path('app/public/files/'), $file_name);
        $data['image'] = $file_name;
        $data['slug'] = $this->makeSlug();
        return Auth::user()->posts()->create($data);
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        $data = request()->only(['title', 'body']);
        if (request()->has('image')) {
            if (file_exists(storage_path('app/public/files/' . $post->image))) {
                unlink(storage_path('/files/' . $post->image));
            }
            $file = request()->file('image');
            $file_name = Str::random() . time() . "." . $file->clientExtension();
            $file->move(storage_path('app/public/files/'), $file_name);
            $data['image'] = $file_name;
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
        return str_shuffle(Str::random() . time());
    }
}
