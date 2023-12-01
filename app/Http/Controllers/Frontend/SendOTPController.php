<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
// use Illuminate\Http\Request;
// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\RequestException;
// use GuzzleHttp\Psr7\Request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendOTPController extends Controller
{
    public function sendOTP()
    {
        // Step 1: Generate the OTP (you can use any method to generate the OTP)
        $otp = mt_rand(100000, 999999);

        $url = 'https://api.ultramsg.com/instance56146/messages/chat';
        $params = [
            'token' => '23mco3j0m42ai601',
            'to' => '+201553582509',
            'body' => 'Your OTP is: ' . $otp . ' for account verification on YourApp.', // Modify the message as needed
        ];

        $response = Http::post($url, $params);

        // Check if the request was successful
        if ($response->successful()) {
            echo $response->getBody();
        } else {
            echo 'Failed to send message. Response status: ' . $response->status();
        }
    }
}