<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('vendor', function (Builder $builder) {
            $builder->where('notifiable_type', 'App\Models\Vendor');
        });
        
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'notifiable_id','id');
    }
}
