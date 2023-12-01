<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeValueRequest extends FormRequest
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
            'attribute_id' => 'required|exists:attributes,id',
            'name' => 'required|string|max:255',
            'value' => 'nullable|string|max:255',
            'vendor_id' => 'nullable|exists:vendors,id',
            // Add more validation rules as needed
        ];
    }
}