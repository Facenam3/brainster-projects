<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'user_id', 'comment_body', 'parent_id'];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies(){
        $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent() {
        $this->belongsTo(Comment::class, 'parent_id');
    }
}
