<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|string|max:255|unique:coupons',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'discount_amount' => 'nullable|string',
            'discount_percentage' => 'nullable|string',
            'expiration_date' => 'required|date',
            'usage_limit' => 'required|integer',
            'usage_count' => 'required|integer',
            'status' => 'in:active,inactive',
            'store_id' => 'nullable|exists:stores,id',
        ];
    }
}