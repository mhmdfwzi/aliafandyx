<?php

namespace App\Models;

use App\Http\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends User
{
    use HasFactory , Notifiable , HasApiTokens , HasRoles;

    protected $fillable =[
        'name','user_name','email','password','phone_number','super_admin','status'
    ];

    public function profile(){

        return $this->hasOne(Profile::class,'user_id','id')->withDefault();
    }
}
