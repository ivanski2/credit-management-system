<?php

namespace Database\Seeders;

use App\Models\Credit;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credit::create([
            'borrower_name' => 'Ivan Ivanov',
            'amount' => 5000.00,
            'term' => 24,
            'monthly_payment' => 226.85,
            'remaining_amount' => 5000.00,
            'identifier' => Credit::generateUniqueIdentifier()
        ]);

        Credit::create([
            'borrower_name' => 'Georgi Petkov',
            'amount' => 10000.00,
            'term' => 48,
            'monthly_payment' => 243.00,
            'remaining_amount' => 10000.00,
            'identifier' => Credit::generateUniqueIdentifier()
        ]);

        Credit::create([
            'borrower_name' => 'Petar Nedqlkov',
            'amount' => 15000.00,
            'term' => 60,
            'monthly_payment' => 303.25,
            'remaining_amount' => 15000.00,
            'identifier' => Credit::generateUniqueIdentifier()
        ]);
    }
}
