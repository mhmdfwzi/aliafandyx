<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'category_id', 'brand_id', 'store_id', 'price', 'compare_price', 'status',
        'featured', 'quantity','short_description','measure','offer'
        // 'product_type'
    ];

    //// array that have fields/columns that I want to hide in json response using api
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'image'
    ];

    // append take Accessory name that we want to append in json response
    protected $appends = [
        'image_url',
    ];


    // -------------------------------------   ---------------------------------------------- //

    //// global scope defined on booted function
    protected static function booted()
    {
        // used to get stored of the auth user
        static::addGlobalScope('store', new StoreScope());

        // set product slug once enter product name
        static::creating(function (Product $product) {
            $product->slug = Str::slug($product->name);
        });
    }

    // -------------------------------------Relationships---------------------------------------------- //

    //// one-to-one relationship
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id')->withDefault(['name' => '-']);
    }

    //// one-to-one relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    //// one-to-one relationship
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');

    }




    //// many-to-many relationship
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,       // Related Model
            'product_tag',    // Pivot table name
            'product_id',     // Fk in pivot table for the current model
            'tag_id',         // Fk in pivot table for the related model
            'id',             // PK for current model
            'id'              // Pk for related model
        );
    }

    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class);
    }



    //// many-to-many relationship
    public function attributes()
    {
        return $this->belongsToMany(
            Attribute::class,       // Related Model
            'product_attributes',   // Pivot table name
            'product_id',           // Fk in pivot table for the current model
            'attribute_id',         // Fk in pivot table for the related model
            'id',                   // PK for current model
            'id'                    // Pk for related model
        );
    }

    //// many-to-many relationship
    public function attribute_values()
    {
        return $this->belongsToMany(
            AttributeValue::class,       // Related Model
            'product_attribute_value',   // Pivot table name
            'product_id',                // Fk in pivot table for the current model
            'attribute_value_id',              // Fk in pivot table for the related model
            'id',                       // PK for current model
            'id'                        // Pk for related model
        );
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    // -------------------------------------Acessories---------------------------------------------- //



    // Acessories definition =>  public function get...Attribute(){}

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/thumbnail/' . $this->image);
    } // $product->image_url
	
	    public function getImageUrlPdAttribute()
    {
        if (!$this->image) {
            return 'https://scotturb.com/wp-content/uploads/2016/11/product-placeholder-300x300.jpg';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    } // $product->image_url_Pd


 


    public function getSalePercentAttribute()
    {

        if (!$this->compare_price) {
            return 0;
        }
        if ($this->compare_price === null || $this->price === null) {
            return 0;
        }
        if ($this->compare_price == 0) {
            return 0;
        }
        return number_format(100 - (100 * $this->price / $this->compare_price), 0);


        // return number_format(100 - (100 * $this->price / $this->compare_price), 0);
    } // $product->sale_percent


    // ----------------------------------------------------------------------------------- //

    // local scope
    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }
    // local scope
    // filter
    public function scopeFilter(Builder $builder, $filters)
    {
        // array_merge() used to merge two arrays
        $options = array_merge([
            'store_id' => null,
            'category_id' => null,
            'tag_id' => null,
            'status' => 'active',
        ], $filters);



        $builder->when($options['status'], function ($query, $value) {
            return  $query->where('status', $value);
        });

        //// بتاعوا بيساوى كذا store_id اللى ال Product هات موديل ال  store_id لما يبقى فيه
        $builder->when($options['store_id'], function ($builder, $value) {
            //// $builder equivalent to Product model
            $builder->where('store_id', $value);
        });

        $builder->when($options['category_id'], function ($builder, $value) {
            $builder->where('category_id', $value);
        });

        $builder->when($options['tag_id'], function ($builder, $value) {

            //// دى tags اللى ليهم ال products هاتلى كل ال
            // $builder->whereRaw(
            //     'id In (SELECT product_id FROM product_tag WHERE tag_id = ?)' , [$value]
            // );

            //// بتاعها أحسن performance اللى فوق بس دى ال function نفس ال
            // $builder->whereRaw(
            //     'EXISTS (SELECT * FROM product_tag WHERE tag_id = ? AND product_id = products.id)' , [$value]
            // );


            //// query اللى فوقيها على طول بس بطريقة ال function  نفس ال
            $builder->whereExists(function ($query) use ($value) {
                $query->select(1)
                    ->from('product_tag')
                    ->whereRaw('product_id = products.id')
                    ->where('tag_id', $value);
            });


            //// less performance than above function but do something
            // $builder->whereHas('tags',function($builder) use ($value){
            //     $builder->where('id',$value);
            // });



            //// Product models which has tags
            // $builder->has('tags');
        });
    }
}