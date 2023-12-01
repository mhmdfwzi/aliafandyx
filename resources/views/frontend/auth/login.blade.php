<x-front-layout>


    <x-slot name="breadcrumbs">

 
        <!-- End Breadcrumbs -->
    </x-slot>

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{ Route('login') }}" method="post">
                        @csrf
                        <div class="card-body" style="direction: rtl">
                            
                            <div class="title">
                                <h3>سجل دخول الان</h3>
                                 
                            </div>
                             
                             
                            @if ($errors->has(config('fortify.username')))
                                <div class="alert alert-danger">
                                    {{ $errors->first(config('fortify.username')) }}
                                </div>
                            @endif
                            <div class="form-group input-group">
                                 
                                <input class="form-control" type="text" name="email" id="email"
                                  placeholder="رقم التليفون"  id="reg-email" required style="direction: ltr; text-align:right">
                            </div>
                            <div class="form-group input-group">
                                 
                                <input class="form-control" type="password" name="password" id="reg-pass" 
                                placeholder="كلمة المرور" required>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" value="1"
                                        class="form-check-input width-auto" id="exampleCheck1">
                                    <label class="form-check-label">حفظ بينات الدخول</label>
                                </div>{{--
                                @if (Route::has('password.request'))
                                    <a class="lost-pass" href="{{ Route('password.request') }}">Forgot password?</a>
                                @endif
--}}
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">تسجيل دخول</button>
                            </div>
                            @if (Route::has('register'))
                                <p class="outer-link"> لو معندكش حساب سجل بسهوله مرة واحدة <a href="{{ Route('register') }}">سجل حساب جديد من هنا
                                          </a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->


</x-front-layout>
