<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transactionType() {
        return $this->belongsTo(TransactionType::class);
    }
    
}
