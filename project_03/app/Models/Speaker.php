<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'photo'
    ];

    public function conferences() {
        return $this->belongsToMany(Conference::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function agendas() {
        return $this->belongsToMany(Agenda::class);
    }
}
