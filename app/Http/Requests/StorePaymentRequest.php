<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'identifier' => 'required|exists:credits,identifier', // Validate by identifier
            'amount' => 'required|numeric|min:1',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'identifier.exists' => 'The selected credit identifier does not exist.',
            'amount.required' => 'The payment amount is required.',
            'amount.numeric' => 'The payment amount must be a valid number.',
            'amount.min' => 'The payment amount must be at least 1.',
        ];
    }
}
