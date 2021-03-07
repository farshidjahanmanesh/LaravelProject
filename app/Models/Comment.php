<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=
        [
            'text',
            'name',
            'post_id',
            'isActive'
        ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
