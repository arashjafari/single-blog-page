<?php

namespace Tests\Unit\Repositories;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    protected $commentRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->commentRepository = new CommentRepository();
    }

    public function test_store_func_in_comment_service_repository()
    {
        $comment = Comment::factory()->make();

        $this->commentRepository->store($comment->toArray());
        
        $this->assertDatabaseHas('comments', [
            'name' => $comment->name,
            'body' => $comment->body,
        ]);
    }

    public function test_index_func_in_comment_service_repository()
    {
        $postId = 1;
        Comment::factory(3)->create([ 'post_id' => $postId ]);

        $comments = $this->commentRepository->index($postId);
 
        $this->assertCount(3, $comments);
    }

    public function test_index_func_in_comment_service_repository_with_nested_children()
    {
        $postId = 1;
        $parentComment = Comment::factory()->create([ 'post_id' => $postId ]);
        Comment::factory(3)->create([ 'post_id' => $postId, 'parent_id' => $parentComment->id ]);

        $comments = $this->commentRepository->index($postId);
        
        $this->assertCount(1, $comments);
        $this->assertCount(3, $comments[0]['nested_children']);
    }
}
