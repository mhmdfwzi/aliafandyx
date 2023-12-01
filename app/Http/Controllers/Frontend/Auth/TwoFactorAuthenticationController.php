<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthenticationController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('frontend.auth.two-factor-auth',compact('user'));
    }
}
