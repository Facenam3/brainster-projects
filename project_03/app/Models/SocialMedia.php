<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'speaker_id',
        'employee_id',
        'company_id',
        'facebook',
        'instagram',
        'linkedin',
        'github'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function speaker() {
        return $this->belongsTo(Speaker::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
