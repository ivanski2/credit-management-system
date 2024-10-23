<?php

namespace App\Http\Requests;

use App\Models\Credit;
use Illuminate\Foundation\Http\FormRequest;

class StoreCreditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'borrower_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1|max:80000',
            'term' => 'required|integer|min:3|max:120',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalExistingCredits = Credit::where('borrower_name', $this->borrower_name)->sum('amount');

            if ($totalExistingCredits + $this->amount > 80000) {
                $validator->errors()->add('borrower_name', 'The borrower already has credits totaling more than 80,000 BGN.');
            }
        });
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'term.min' => 'Minimum period is 3 month.',
            'term.max' => 'Maximum period is 120 month.',
        ];
    }
}
