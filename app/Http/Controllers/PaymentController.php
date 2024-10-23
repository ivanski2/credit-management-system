<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function create()
    {
        $credits = Credit::all();
        return view('payments.create', compact('credits'));
    }

    public function store(StorePaymentRequest $request)
    {
        $credit = Credit::where('identifier', $request->identifier)->firstOrFail();
        $remainingAmount = $credit->remaining_amount;

        // If the payment amount exceeds the remaining amount, adjust it
        if ($request->amount > $remainingAmount) {
            $request->amount = $remainingAmount;
            Session::flash('warning', 'The payment exceeds the remaining amount. Only the remaining balance has been deducted.');
        }

        // Create the payment and update the remaining amount
        Payment::create([
            'credit_id' => $credit->identifier,
            'amount' => $request->amount,
        ]);

        $credit->remaining_amount -= $request->amount;
        $credit->save();

        // Redirect back to the list of credits
        return redirect()->route('credits.index')->with('success', 'Payment successfully processed.');
    }
}
