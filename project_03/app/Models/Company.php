<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'general',
        'hero_image',
        'about_us',
        'contact',
        'location'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }
}
