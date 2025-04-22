<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'theme',
        'description',
        'objective',
        'date',
        'location',
        'status',
        'ticket_id',
        'speaker_id'
    ];

    public function speaker(){
        return $this->belongsTo(Speaker::class);
    }

    public function ticket() {
        return $this->hasMany(Ticket::class);
    }
}
