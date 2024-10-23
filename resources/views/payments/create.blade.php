@extends('layouts.app')

@section('content')
    <h1>New Payment</h1>
    <form method="POST" action="{{ route('payments.store') }}">
        @csrf
        <label>Select Credit:</label>
        <select name="identifier">
            @foreach($credits as $credit)
                <option value="{{ $credit->identifier }}">{{ $credit->borrower_name }} ({{ $credit->remaining_amount }}
                    BGN)
                </option>
            @endforeach
        </select>
        <label>Amount (BGN):</label>
        <input type="number" name="amount" required>
        <button type="submit">Pay</button>
    </form>
@endsection
