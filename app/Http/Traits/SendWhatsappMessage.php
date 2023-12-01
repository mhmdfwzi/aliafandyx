<?php

namespace App\Http\Traits;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

trait sendWhatsAppMessage
{
    public function sendMessage($phone_number,$messageBody)
    {


        $url = 'https://api.ultramsg.com/instance62549/messages/chat';
        $params = [
            'token' => '9nnuiblewc8b955q',
            'to' => $phone_number,
            'body' => $messageBody, // Modify the message as needed
        ];

        $response = Http::post($url, $params);

        // Check if the request was successful
        if ($response->successful()) {
            // OTP sent successfully

            return true;
        } else {
            // Failed to send OTP

            return false;
        }
    }

    
}