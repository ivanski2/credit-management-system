@extends('layouts.app')

@section('content')
    <h1>New Credit</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('credits.store') }}">
        @csrf

        <div class="mb-3">
            <label for="borrower_name" class="form-label">Borrower's Name:</label>
            <input type="text" class="form-control" name="borrower_name" value="{{ old('borrower_name') }}" required>
            @error('borrower_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount (BGN)</label>
            <input type="number" class="form-control" name="amount" value="{{ old('amount') }}" required>
            @error('amount')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="term" class="form-label">Term (months):</label>
            <input type="number" class="form-control" name="term" value="{{ old('term') }}" required>
            @error('term')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Credit</button>
    </form>
@endsection
