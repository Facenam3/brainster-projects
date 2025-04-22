<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    protected $fillable = ['blog_body_id', 'title', 'content'];

    public function body() {
        return $this->belongsTo(BlogBody::class);
    }

}
