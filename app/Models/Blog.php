<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = [
        'blog_title', 
        'blog_details',
        'blog_slug',
        'blog_image',
        'blog_views',
        'blog_tags',
        'deleted',
        'UserId',
    ];
}
