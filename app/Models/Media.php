<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    // Table
    protected $table = 'media';

    // Fillable
    protected $fillable = [
        'media_type',
        'media_path',
        'media_name'
    ];
}
