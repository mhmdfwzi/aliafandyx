<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\SendVerifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class CustomVerificationController extends Controller
{
    use SendVerifications;
 

    public function resendOTP()
    {

        $user= Auth::user();

        $phone_number = '+2' . $user->phone_number;

        // Send OTP to the user's phone number
        $otpSent = $this->sendOTP($phone_number);

        return redirect()->back();

        // return view('frontend.auth.verify');

    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);

        // Remove the +2 prefix from the phone number if present
        $phone_number = str_replace('+2', '', $data['phone_number']);

        if(Auth::user()) {
            $phone_number = Auth::user()->phone_number;
        }


        // Get the stored OTP from the session
        $storedOtp = Session::get('phone_otp');

        // dd($phone_number, $storedOtp);

        // Compare the entered verification code with the stored OTP
        // Compare the entered verification code with the stored OTP
        if ($data['verification_code'] == $storedOtp) {
            // Verification successful, mark the user's email as verified (if using email verification)
            // ... your verification logic ...

            // Find the user by the phone number and update the `isVerified` flag
            $user = User::where('phone_number', $phone_number)->first();

            if ($user) {
                $user->update(
                    ['isVerified' => true,
                'email_verified_at'=>now()],
                );

                // Log in the user
                Auth::login($user);

                // Clear the stored OTP from the session
                Session::forget('phone_otp');

                // Redirect the user to the login page or any other desired page
                return redirect()->route('login')->with(['message' => 'Phone number verified']);
            } else {
                // User not found with the provided phone number
                return response()->json(['message' => 'User not found'], 404);
            }
        } else {
            // Verification failed, return an error response
            return response()->json(['message' => 'Invalid verification code'], 422);
        }


    }
}