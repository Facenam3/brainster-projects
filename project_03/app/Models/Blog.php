<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = ['blog_title', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function relatedBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_related_blogs', 'blog_id', 'related_blog_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function body() {
        return $this->hasOne(BlogBody::class);
    }
}
