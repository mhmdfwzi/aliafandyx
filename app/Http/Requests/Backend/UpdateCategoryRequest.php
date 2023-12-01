<?php

namespace App\Http\Requests\Backend;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $id = $this->route('category');
        // dd($id);
        return 
        [
            'name'=>[
                "required",
                "min:3",
                "max:355",
                "unique:categories,name,$id",
                // function($attributes, $value ,$fails){
                //     if(strtolower($value) == 'laravel'){
                //         $fails('This is name forbidden');
                //     }
                // }
                // new Filter('laravel')
                'filter:laravel,flutter'
            ],
            'parent_id'=>['nullable','int','exists:categories,id'],
            'image'=>['image'],
            'status'=>'in:active,inactive' 
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'أسم التنصيف مطلوب',
            // 'name.string'=>'أسم التنصيف يجب أن يكون حروف ليس أرقام',
            'name.min'=>'أسم التنصيف يجب أن يكون 3 حروف أو أكثر',
            'name.max'=>'أسم التنصيف يجب أن لا يتخطى 255 حرف',
            'name.unique'=>'أسم التنصيف موجود من قبل',
        ];
    }
}
