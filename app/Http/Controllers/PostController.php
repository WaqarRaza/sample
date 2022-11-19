<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PostCrudRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    public function index(PostCrudRepository $repostory)
    {
        try {
            return view('posts.index', ['records' => $repostory->index()]);
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'server error');
        }
    }

    
    public function create()
    {
        return view('posts.create');
    }

    
    public function store(PostRequest $request, PostCrudRepository $repostory)
    {
        try {
            $repostory->store();
            return redirect()->route('posts.index');
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'server error');
        }
    }

 
    public function show($id, PostCrudRepository $repostory)
    {
        return view('posts.show', ['record' => $repostory->find($id)]);
    }

    
    public function edit($id, PostCrudRepository $repostory)
    {
        return view('posts.edit', ['record' => $repostory->find($id)]);
    }

   
    public function update(PostRequest $request, $id, PostCrudRepository $repostory)
    {
        try {
            $repostory->update($id);
            return redirect()->route('posts.index');
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'server error');
        }
    }

    
    public function destroy($id, PostCrudRepository $repostory)
    {
        try {
            $repostory->delete($id);
            return redirect()->route('posts.index');
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'server error');
        }
    }
}