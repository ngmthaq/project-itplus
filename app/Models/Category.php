<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Table
    protected $table = 'categories';

    // Fillable
    protected $fillable = [
        'name_vi',
        'name_en',
        'description'
    ];

    // Has many posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public static function countValidPostWithCategory()
    {
        $categories = Category::withCount([
            'posts' => function(Builder $query) {
                $query->whereNull('deleted_at');
            }])->get();
        return $categories;
    }
}
