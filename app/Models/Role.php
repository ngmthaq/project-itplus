<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Table
    protected $table = 'roles';

    // Fillable
    protected $fillable = [
        'name_vi',
        'name_en',
        'description'
    ];

    // Has many users
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
