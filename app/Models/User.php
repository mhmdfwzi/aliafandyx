<?php

namespace App\Models;

use App\Http\Traits\HasRoles;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Twilio\Rest\Client;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable ;
    use TwoFactorAuthenticatable ;
    use SoftDeletes ;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'phone_number',
        'governorate_id',
        'city_id',
        'neighborhood_id', 
        'postal_code',
        'street_address',
        'email_verified_at',
        'remember_token',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {

        return $this->hasOne(Profile::class, 'user_id', 'id')->withDefault();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateCode()
    {
        $code = rand(1000, 9999);

        UserCode::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );

        $receiverNumber = auth()->user()->phone;
        $message = "2FA login code is ". $code;

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public function governorate(){
        return $this->belongsTo(Destination::class,'governorate_id','id');
    }

    public function city(){
        return $this->belongsTo(Destination::class,'city_id','id');
    }

    public function neighborhood(){
        return $this->belongsTo(Destination::class,'neighborhood_id','id');
    }
}