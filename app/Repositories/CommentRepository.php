<?php

namespace App\Repositories;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentRepository
{
    public function index($postId): array
    {
        return Comment::wherePostId($postId)
                            ->whereNull('parent_id')
                            ->with('nestedChildren')
                            ->latest()
                            ->get()
                            ->toArray();
    }

    public function store(array $data): void
    {
        Comment::create($data);
    }
}
