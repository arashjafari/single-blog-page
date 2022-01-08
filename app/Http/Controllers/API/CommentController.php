<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    public function index($postId, CommentRepository $repository)
    {
        return response()->json([
            'comments' => $repository->index($postId),
        ]);
    }
    
    public function store(CommentRequest $request, CommentRepository $repository)
    {
        $repository->store($request->validated());
        
        return response()->json(['message' => __('Comment created successfully!')], 201);
    }
}
