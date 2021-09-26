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

    /**
     * Đếm số lượng post chưa bị xoá
     * (Count valid post)
     * 
     * @param array $posts
     * 
     * @return int
     */
    public static function countValidPosts($posts)
    {
        $result = 0;
        if (count($posts) > 0) {
            foreach ($posts as $post) {
                if (!$post->deleted_at) {
                    $result++;
                }
            }
        }
        return $result;
    }

    /**
     * Đếm số lượng comment của từng post, lấy ra 4 post có nhiều comment nhất.
     * Sử dụng totalComments để gọi tổng số comments.
     * (Count comment of each post)
     * 
     * @param array|object|collection $posts
     * 
     * @return array
     */
    public static function postWithComments($posts)
    {
        // Comment của bài viết
        foreach ($posts as $post) {
            $post->totalComments = count($post->comments);
        }
        $sorted = $posts->sortByDesc('totalComments');
        $index = 0;
        $result = [];
        foreach ($sorted as $post) {
            $result[] = $post;
            $index++;
            if ($index > 3) {
                break;
            }
        }
        return $result;
    }
}
