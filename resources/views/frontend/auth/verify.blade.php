<x-front-layout>


    <x-slot name="breadcrumbs">


        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    @php
                        $phone = Session::get('phone');
                        
                    @endphp
                    <form class="card login-form" autocomplete="off" action="{{ Route('custom_verification') }} "
                        method="post" style="direction:rtl ">

                        @csrf

                        <div class="card-body">

                            <div class="title">
                                @auth
                                    <div class="row" style="margin-bottom:20px">
                                        <div class="col-md-8">
                                            <p class="text-danger">Your Account is Not Verified Please Verify Now</p>
                                        </div>
                                        <div class="col-md-4" style="text-align: right">
                                            <a href="{{ Route('resendOTP') }}"> Resend OTP </a>
                                        </div>
                                    </div>
                                @endauth
                                <h3>تفعيل الحساب</h3>
                                <p style="direction: rtl">- من هنا تقدر تدخل الكود اللى وصلك عالواتس اب   @auth
                                     {{ Auth()->user()->phone_number }}
                                @endauth
                                {{ $phone }} عشان تفعيل الحساب وتقدر تطلب  براحتك
                                    <p style="direction: rtl">- سعداء دايما بخدمتك 
                                  
                                </p>
                            </div>


                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form-group row"> 
                                    
                                <div class="col-md-12 col-12">
                                    @if (Auth::user())
                                        <input type="hidden" name="phone_number"
                                            value="{{ Auth()->user()->phone_number }}">
                                    @else
                                        <input type="hidden" name="phone_number" value="{{ $phone }}">
                                    @endif
                                    <input id="verification_code" type="tel" style="text-align: right;direction:rtl"
                                     autofocus placeholder="سجل كود تفعيل الحساب بالارقام الانجليزيه"
                                        class="form-control @error('verification_code') is-invalid @enderror"
                                        name="verification_code" value="{{ old('verification_code') }}" required>
                                    @error('verification_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                        </div>

                        <div class="button">
                            <button id="verifyButton" class="btn" type="submit">Verify</button>
                        </div>




                </div>
                </form>

                {{-- <div class="button ">
                    <a id="ResendOTPButton" class="btn" href="{{ Route('resendOTP') }}"
                        style="background-color: red">Resend
                        Verification Code</a>
                    <button class="btn" style="background-color: red">Resend Verification Code</button>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    <!-- End Account Login Area -->



</x-front-layout>