<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory;
    // SoftDeletes;
    protected $fillable = [
        'name','parent_id','description','image','slug','status',
        'featured' , 'product_type'
    ];

    //// reverse of fillable
    // protected $guarded=[
    //     'id'
    // ];

    public function products(){

        return $this->hasMany(Product::class,'category_id','id');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id')->withDefault(['name'=>'-']);
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }


    public function getImageUrlAttribute(){
        if(!$this->image){
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if(Str::startsWith($this->image, ['http://','https://'])){
            return $this->image;
        }
        return asset('storage/thumbnail/'.$this->image);
    } // $category->image_url


}
