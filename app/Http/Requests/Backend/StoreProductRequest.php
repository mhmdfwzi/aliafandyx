<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>[
                'required',
                'min:3',
                'max:355',
                'filter:laravel,flutter'
            ],
            'category_id'=>['required','int','exists:categories,id'],
            'image'=>['required','image'],
            'status'=>['in:active,inactive,draft'],
            'price'=>['required','numeric'],
            'compare_price'=>['required','int'],
            'quantity'=>['required','int']

        ];
    }


    
    public function messages()
    {
        return[
            'name.required'=>'أسم المنتج مطلوب',
            'name.alpha'=>'أسم التنصيف يجب أن يكون حروف ليس أرقام',
            'name.min'=>'أسم المنتج يجب أن يكون 3 حروف أو أكثر',
            'name.max'=>'أسم المنتج يجب أن لا يتخطى 255 حرف',
            'name.unique'=>'أسم التنصيف موجود من قبل',
            'price.required'=>'سعر المنتج مطلوب',
            'price.numeric'=>'سعر المنتج يجب ان يكون رقم',
            'compare_price.required'=>'السعر القديم للمنتج  مطلوب',
            'quantity.required'=>'العدد مطلوب',
            'image.required'=>' صورة المنتج مطلوبة',
            'quantity.int'=>'العدد يجب ان يكون ارقام انجليزيه',
            'price.numeric'=>'السعر يجب ان يكون ارقام انجليزيه',
            'Compare_Price.numeric'=>'السعر القديم يجب ان يكون ارقام انجليزيه',
            

            
            

            
        ];
    }
}
