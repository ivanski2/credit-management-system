<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = ['borrower_name', 'amount', 'term', 'monthly_payment', 'remaining_amount'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function calculateMonthlyPayment()
    {
        $annualInterestRate = 0.079;
        $monthlyInterestRate = $annualInterestRate / 12;
        $term = $this->term;
        $amount = $this->amount;

        $monthlyPayment = ($amount * $monthlyInterestRate) /
            (1 - pow(1 + $monthlyInterestRate, -$term));

        return round($monthlyPayment, 2);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($credit) {
            $credit->monthly_payment = $credit->calculateMonthlyPayment();
            $credit->remaining_amount = $credit->amount;
            $credit->identifier = self::generateUniqueIdentifier();
        });
    }

    public static function generateUniqueIdentifier()
    {
        // Retrieve the last record ordered by ID in descending order
        $lastCredit = Credit::orderBy('id', 'desc')->first();

        // If there are no records, start with ID 0
        $lastId = $lastCredit ? $lastCredit->id : 0;

        // Increment the last ID by 1 and format it as a 7-digit number with leading zeros
        return str_pad($lastId + 1, 7, '0', STR_PAD_LEFT);
    }

}
