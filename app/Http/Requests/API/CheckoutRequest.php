<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|max:255|',
            'address' => 'required',
            'phone' => 'required|max:255',
            'transaction_total' => 'required|integer',
            'transaction_status' => 'nullable|string|in:PENDING,SUCCESS,FAILED',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exists:foods,id',
        ];
    }
}
