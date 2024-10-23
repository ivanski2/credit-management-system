<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Credit;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credit = Credit::first();

        Payment::create([
            'credit_id' => $credit->id,
            'amount' => 500.00,
        ]);

        $credit->remaining_amount -= 500.00;
        $credit->save();

        Payment::create([
            'credit_id' => $credit->id,
            'amount' => 250.00,
        ]);

        $credit->remaining_amount -= 250.00;
        $credit->save();
    }
}
