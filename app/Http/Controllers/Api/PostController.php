<?php

namespace App\Http\Controllers\Api;

use App\Http\Repositories\PostCrudRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index(PostCrudRepository $repostory)
    {
        try {
            return response()->json([
                'status' => 200,
                'data' => $repostory->index(),
                'message' => 'List of posts'
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'server error'
            ]);
        }
    }


    public function store(PostRequest $request, PostCrudRepository $repostory)
    {
        try {
            return response()->json([
                'status' => 200,
                'data' => $repostory->store(),
                'message' => 'Post created'
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'server error'
            ]);
        }
    }


    public function show($id, PostCrudRepository $repostory)
    {
        // we can also find post based upon slug, its all about need of the project
        try {
            return response()->json([
                'status' => 200,
                'data' => $repostory->find($id),
                'message' => 'Post details'
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'server error'
            ]);
        }
    }

    public function update(PostRequest $request, $id, PostCrudRepository $repostory)
    {
        try {
            return response()->json([
                'status' => 200,
                'data' => $repostory->update($id),
                'message' => 'Post updated'
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'server error'
            ]);
        }
    }


    public function destroy($id, PostCrudRepository $repostory)
    {
        try {
            return response()->json([
                'status' => 200,
                'data' => ['deleted' => $repostory->delete($id)],
                'message' => 'Post removed'
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'server error'
            ]);
        }
    }
}
