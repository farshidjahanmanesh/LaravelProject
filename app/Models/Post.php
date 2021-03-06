<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'text',
        'isActive',
        'user_id',
        'title',
        'picture',
        'Category_id',
        'isSelectByEditor'
    ];

    public function Likes()
    {
        return $this->hasMany(Like::class, 'Post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
