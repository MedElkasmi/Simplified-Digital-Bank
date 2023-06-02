<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class securityQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function securityAnswers() {
        return $this->hasMany(UserSecurityAnswer::class);
    }
    
}
