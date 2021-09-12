<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // Table
    protected $table = 'types';

    // Fillable
    protected $fillable = [
        'name_vi',
        'name_en',
        'description'
    ];

    // Has many posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'type_id');
    }
}
