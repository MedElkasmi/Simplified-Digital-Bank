<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function accountType() {
        
        return $this->belongsTo(AccountType::class);
    }


    public static function generateUniqueAccountNumber() {

        do {

            $account_number = str_pad(rand(0, pow(10, 12)-1), 12, '0', STR_PAD_LEFT);
        } 

        while (self::where('account_number',$account_number)->exists());

        return $account_number;
    }
    
}
