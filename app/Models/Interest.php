<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Interest extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function account() {

        return $this->belongsTo(Account::class);
    }

    public function calculateSimpleInterest() {
        $account = $this->account; // get associated account
    
        // Check if calculation_date is more than 24 hours ago
        if (Carbon::now()->subHours(24)->greaterThan($this->calculation_date)) {
            $principal = $account->balance; // the current balance of the account
            $rate = $this->interest_rate; // the interest rate associated with the interest record
            $time = Carbon::now()->diffInDays($this->calculation_date); // the difference in days since the last interest calculation
    
            $interest = ($principal * $rate * $time) / 100; // simple interest calculation formula I = PRT
    
            // Update calculation_date to current time
            $this->calculation_date = Carbon::now();
            $this->save();
    
            return $interest;
        }
        return 0;
    }
    
    
    

}
