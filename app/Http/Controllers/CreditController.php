<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditRequest;
use App\Models\Credit;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::all();
        return view('credits.index', compact('credits'));
    }

    public function create()
    {
        return view('credits.create');
    }

    public function store(StoreCreditRequest $request)
    {
        Credit::create($request->validated());
        return redirect()->route('credits.index')->with('success', 'Credit was created successful.');
    }
}
