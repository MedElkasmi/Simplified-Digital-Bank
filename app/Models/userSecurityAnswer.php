<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userSecurityAnswer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function securityQuestion() {
        return $this->belongsTo(SecurityQuestion::class);
    }
    
}
