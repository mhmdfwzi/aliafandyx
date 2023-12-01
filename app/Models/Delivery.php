<?php

namespace App\Models;

use App\Http\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Delivery extends User
{
    use HasFactory ;
    use Notifiable ;
    use HasApiTokens ;
    use HasRoles;

    protected $table = 'delivery';

    protected $fillable = [
        'name',
        'email',
        'password',
       'phone_number',
       'category_id'
    ];

    public function category(){

        return  $this->belongsTo(Category::class);


    }

}
