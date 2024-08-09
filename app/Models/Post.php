<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
