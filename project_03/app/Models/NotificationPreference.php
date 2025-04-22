<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'notification_type_id',
        'enabled'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function notificationType(){

        return $this->belongsTo(NotificationType::class);
    }
}
