<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'banner_name' => 'required|string|max:255',
            'banner_type'=>'required|in:main_banner,product_banner,offer_banner',
            'url' => 'nullable|url',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'offer_title' => 'nullable|string|max:255',
            'offer' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation rules
        ];
    }
}