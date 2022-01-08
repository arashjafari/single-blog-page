<?php

namespace Tests\Feature\API;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_visitor_can_leave_a_comment()
    {
        $comment = Comment::factory()->make();
        $response = $this->json('POST', '/api/v1/comments', $comment->toArray());

        $response->assertStatus(201);

        $this->assertDatabaseHas('comments', [
            'name' => $comment->name,
            'body' => $comment->body,
        ]);
    }

    public function test_visitor_can_see_all_comments()
    {
        $postId = 1;
        Comment::factory(3)->create([ 'post_id' => $postId ]);

        $response = $this->json('GET', '/api/v1/comments/' . $postId);
 
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'comments');
    }

    public function test_visitor_can_see_all_comments_with_nested_children()
    {
        $postId = 1;
        $parentComment = Comment::factory()->create([ 'post_id' => $postId ]);
        Comment::factory(3)->create([ 'post_id' => $postId, 'parent_id' => $parentComment->id ]);

        $response = $this->json('GET', '/api/v1/comments/' . $postId);
         
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'comments');
        $response->assertJsonCount(3, 'comments.0.nested_children');
    }

    public function test_get_all_comment_and_check_json_struct()
    {
        $postId = 1;
        $parentComment = Comment::factory()->create([ 'post_id' => $postId ]);
        Comment::factory(3)->create([ 'post_id' => $postId, 'parent_id' => $parentComment->id ]);

        $response = $this->json('GET', '/api/v1/comments/' . $postId);
         
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'comments' => [
                [
                    'id',
                    'name',
                    'body',
                    'parent_id',
                    'post_id',
                    'created_at',
                    'nested_children' => [
                        [
                            'id',
                            'name',
                            'body',
                            'parent_id',
                            'post_id',
                            'created_at',
                        ]
                    ]
                ]
            ]
        ]);
    }
}
