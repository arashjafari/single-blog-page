<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_comments_database_has_correct_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('comments', [
                'id',
                'post_id',
                'parent_id',
                'name',
                'body',
                'created_at',
                'updated_at',
            ]),
            1
        );
    }

    public function test_comment_has_parent_relation()
    {
        $parentComment = Comment::factory()->create();
        $childComment = Comment::factory([ 'parent_id' => $parentComment->id ])->create();

        $this->assertInstanceOf(Comment::class, $childComment->parent);
    }

    public function test_comment_has_children_relation()
    {
        $parentComment = Comment::factory()->create();
        $childComment = Comment::factory([ 'parent_id' => $parentComment->id ])->create();

        // A comment exists in a comment's children collections.
        $this->assertTrue($parentComment->children->contains($childComment));
        
        // Count that a children comments collection exists.
        $this->assertEquals(1, $parentComment->children->count());

        // Comments are related to comments and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $parentComment->children);
    }

    public function test_comment_has_nested_children_relation()
    {
        $parentComment = Comment::factory()->create();
        $childComment = Comment::factory([ 'parent_id' => $parentComment->id ])->create();
  
        // A comment exists in a comment's nested collections.
        $this->assertTrue($parentComment->children->contains($childComment));
        
        // Count that a nested comments collection exists.
        $this->assertEquals(1, $parentComment->nestedChildren->count());

        // Nested comments are related to comments and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $parentComment->nestedChildren);
    }

    public function test_comment_has_created_at_attribute()
    {
        $comment = Comment::factory()->create();

        $this->assertIsString($comment->created_at);
    }
  
    public function test_comments_parent_belongs_to_a_comment_with_correct_id()
    {
        $firstComment = Comment::factory()->create();
        $comment = Comment::factory([ 'parent_id' => $firstComment->id ])->create();
 
        $this->assertEquals($firstComment->id, $comment->parent->id);
    }

    public function test_comments_parent_belongs_to_a_comment_when_parent_is_null()
    {
        $comment = Comment::factory()->create();
 
        $this->assertNull($comment->parent);
    }
}
