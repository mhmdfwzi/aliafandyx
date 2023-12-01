<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    // api resource اللى بيرجع عن طريق حاجة أسمها api response على ال  customize ممكن أعمل 

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'product_name'=>$this->name,
            'price'=>[
                'normal'=>$this->price,
                'compare'=>$this->compare_price
            ]
        ];
    }
}
