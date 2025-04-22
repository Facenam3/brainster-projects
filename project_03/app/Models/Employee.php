<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'title',
        'company_id'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }
}
