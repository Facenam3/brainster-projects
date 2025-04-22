<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'speaker_id',
        'event_id',
        'conference_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
