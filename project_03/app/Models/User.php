<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nnjeim\World\Facades\World;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'title',
        'phone',
        'bio',
        'city',
        'country_id',
        'profile_picture',
        'cv_upload'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function country()
    {
        return $this->belongsTo(\Nnjeim\World\Models\Country::class, 'country_id');
    }

    public function badges() {
        return $this->hasMany(Badge::class);
    }

    public function notificationPreferences()
    {
        return $this->hasMany(NotificationPreference::class);
    }
    
}
