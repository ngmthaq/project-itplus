<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Table
    protected $table = 'posts';

    // Fillable
    protected $fillable = [
        'user_id',
        'category_id',
        'type_id',
        'title_vi',
        'title_en',
        'subtitle_vi',
        'subtitle_en',
        'cover_url',
        'content_vi',
        'content_en'
    ];

    // Has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    // Belong to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belong to category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Belong to type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
