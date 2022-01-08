<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'parent_id',
        'name',
        'body',
    ];

    /**
     * Get the comment parent that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * Get the comment children that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * Get the nested children of the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nestedChildren()
    {
        return $this->children()->with('nestedChildren')->latest();
    }

    /**
     * Convert the created_at date to a Carbon instance and format it.
     *
     * @param  string  $value
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
