<?php

namespace App\Repositories;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentRepository
{
    /**
     * Get all comments for a post sorted by latest.
     *
     * @param int $postId
     * @return array
     */
    public function index(int $postId): array
    {
        return Comment::wherePostId($postId)
                            ->whereNull('parent_id')
                            ->with('nestedChildren')
                            ->latest()
                            ->get()
                            ->toArray();
    }

    /**
     * Store a new comment.
     *
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        Comment::create($data);
    }
}
