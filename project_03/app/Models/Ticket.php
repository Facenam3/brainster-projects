<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'price'
    ];

    public function event() {
        return $this->belongsToMany(Event::class);
    }

    public function conference() {
        return $this->belongsToMany(Conference::class);
    }
}
