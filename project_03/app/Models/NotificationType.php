<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NotificationPreference;

class NotificationType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function preference(){
        return $this->hasMany(NotificationPreference::class);
    }
}
