<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','parent_id','rank','price'
    ];
    public function parent()
    {
        return $this->belongsTo(Destination::class, 'parent_id');
    }
}
