<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    //// defaults
    // protected $connection = 'mysql';
    // protected $table = 'stores';
    // protected $primaryKey ='id';
    // public $incrementing = true;
    // public $timestamps = true;
    // const   CREATED_AT ='created_at';
    // const   UPDATED_AT ='updated_at';

    protected $fillable = [
        'name', 'description', 'logo_image', 'cover_image', 'slug', 'status','percent',
        'phone_number','governorate','city','neighborhood','street_address'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }
    // public function categories()
    // {
    //     return $this->hasMany(Category::class, 'category_id', 'id');
    // }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,       // Related Model
            'store_categories',    // Pivot table name
            'store_id',     // Fk in pivot table for the current model
            'category_id',         // Fk in pivot table for the related model
            'id',             // PK for current model
            'id'              // Pk for related model
        );
    }

    public function getLogoImageUrlAttribute()
    {
        if (!$this->logo_image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->logo_image, ['http://', 'https://'])) {
            return $this->logo_image;
        }
        return 'storage/thumbnail/' . $this->logo_image;
    }

    public function getCoverImageUrlAttribute()
    {
        if (!$this->cover_image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->cover_image, ['http://', 'https://'])) {
            return $this->cover_image;
        }
        return 'storage/thumbnail/' . $this->cover_image;
    }
}
