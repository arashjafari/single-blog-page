<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($postId)
    {
        return response()->json([
            'comments' => Comment::wherePostId($postId)->whereNull('parent_id')->with('nestedChildren')->latest()->get()->toArray(),
        ]);
    }
    
    public function store(CommentRequest $request)
    {
        Comment::create($request->validated());

        return response()->json(['message' => 'Comment created successfully'], 201);
    }
}
