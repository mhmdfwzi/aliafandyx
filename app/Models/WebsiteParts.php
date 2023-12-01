<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WebsiteParts extends Model
{
    use HasFactory;

    protected $fillable = ['key','value','image'];
    protected $tableName = 'website_parts';

    public function getImageUrlAttribute(){
        if(!$this->image){
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if(Str::startsWith($this->image, ['http://','https://'])){
            return $this->image;
        }
        return asset('storage/'.$this->image);
    } // $websitePart->image_url


}
