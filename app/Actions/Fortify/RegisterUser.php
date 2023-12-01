<?php

namespace App\Actions\Fortify;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Traits\SendVerifications;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisterUser implements CreatesNewUsers
{
    use PasswordValidationRules ;
    use SendVerifications;

    // create new user not admin

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {

        $data = Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'], 
            'password' => $this->passwordRules(),
            'phone_number'=>['required','min:11',Rule::unique(User::class,'phone_number'),],
            'governorate'=>'nullable',
            'city'=>'nullable',
            'postal_code'=>'nullable',
            'street_address'=>'nullable',
        ])->validate();


        $phone_number = '+2' . $data['phone_number'];

        // Send OTP to the user's phone number
        $otpSent = $this->sendOTP($phone_number);

        if (!$otpSent) {

            // Handle the case when OTP sending fails
            return response()->json(['message' => 'Failed to send OTP'], 500);
        }
        else {



    // Twillio Configuration 
    // /* Get credentials from .env */
    // $token = getenv("TWILIO_TOKEN");
    // $twilio_sid = getenv("TWILIO_SID");
    // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
    // // dd($token,$twilio_sid,$twilio_verify_sid);
    // $twilio = new Client($twilio_sid, $token);
    // $twilio->verify->v2->services($twilio_verify_sid)
    //     ->verifications
    //     ->create($phone_number, "sms");

    Session::put('phone', $phone_number);


    return User::create([
    'first_name' => $input['first_name'],
    'last_name' => $input['last_name'], 
    'email_verified_at' => null,
    'password' => Hash::make($input['password']),
    'phone_number' => $input['phone_number'],
    'governorate_id' => $input['governorate_id'],
    'city_id' => $input['city_id'],
    'neighborhood_id' => $input['neighborhood_id'],
    'street_address' => $input['street_address'],
    'remember_token' => Str::random(10),
    ]);

}

    }
}