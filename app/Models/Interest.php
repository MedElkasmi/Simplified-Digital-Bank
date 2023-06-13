<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function account() {

        return $this->belongsTo(Account::class);
    }

    public function calculateSimpleInterest() {

        if($this->interest) {
            
            $principal = $this->balance; // the current balance of the account
            $rate = $this->interest->interest_rate; // the interest rate associated with the account
            $time = Carbon::now()->diffInYears($this->interest->calculation_date); // the difference in years since the last interest calculation
        
            $interest = ($principal * $rate * $time) / 100; // simple interest calculation formula I = PRT
        
            return $interest;
        }

        return 0;
    }
    

}
