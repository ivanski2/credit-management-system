@extends('layouts.app')

@section('content')
    <h1 class="my-4">Credit Lists</h1>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">Identifier</th>
                <th scope="col">Borrower's Name</th>
                <th scope="col">Amount (BGN)</th>
                <th scope="col">Term (months)</th>
                <th scope="col">Monthly Payment (BGN)</th>
                <th scope="col">Remaining Amount (BGN)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($credits as $credit)
                <tr>
                    <td>{{ $credit->identifier }}</td>
                    <td>{{ $credit->borrower_name }}</td>
                    <td>{{ number_format($credit->amount, 2) }}</td>
                    <td>{{ $credit->term }}</td>
                    <td>{{ number_format($credit->monthly_payment, 2) }}</td>
                    <td>{{ number_format($credit->remaining_amount, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('credits.create') }}" class="btn btn-primary">Add New Credit</a>
        <a href="{{ route('payments.create') }}" class="btn btn-success">Add Payment</a>
    </div>
@endsection
