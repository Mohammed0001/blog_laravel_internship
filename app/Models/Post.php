<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'is_published',
        'post_owner_id'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'post_owner_id');
    }

    public function comments(): HasMany
    {
        // return $this->hasMany(comment::class , 'post_id');

        $comments = $this->hasMany(comment::class , 'post_id');
        // $comments->load('user');
        return $comments;

    }
}
