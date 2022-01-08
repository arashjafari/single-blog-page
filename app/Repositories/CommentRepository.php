<?php

namespace App\Repositories;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentRepository
{
    public function index($postId)
    {
        return Comment::wherePostId($postId)
                            ->whereNull('parent_id')
                            ->with('nestedChildren')
                            ->latest()
                            ->get();
    }

    public function store(CommentRequest $request)
    {
        Comment::create($request->validated());
    }
}
