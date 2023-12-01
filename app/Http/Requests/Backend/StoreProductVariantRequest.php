<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductVariantRequest extends FormRequest
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
            'attribute_value_id' => 'required|exists:attribute_values,id',
            'product_id' => 'required|exists:products,id',
            'description' => 'nullable|string',
            'sku' => 'required|string',
            'price' => 'numeric',
            'compare_price' => 'nullable|numeric',
            'quantity' => 'integer',
            'image' => 'nullable|string',
            'store_id' => 'nullable|exists:stores,id',
        ];
    }
}