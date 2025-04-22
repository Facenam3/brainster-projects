<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'photo',
        'name',
        'description'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
