<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Get all comments for a post sorted by latest.
     *
     * @param int $postId
     * @return JsonResponse
     */
    public function index(int $postId, CommentRepository $repository): JsonResponse
    {
        return response()->json([
            'comments' => $repository->index($postId),
        ]);
    }
    
    /**
     * Store a new comment.
     *
     * @param CommentRequest $request
     * @param CommentRepository $repository
     * @return JsonResponse
     */
    public function store(CommentRequest $request, CommentRepository $repository): JsonResponse
    {
        $repository->store($request->validated());
        
        return response()->json(['message' => __('Comment created successfully!')], 201);
    }
}
