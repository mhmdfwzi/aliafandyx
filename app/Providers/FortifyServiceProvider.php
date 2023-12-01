<?php

namespace App\Providers;

use App\Actions\Fortify\CustomAuthentication;
use App\Actions\Fortify\RegisterUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Auth\CustomRegisterResponse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Fortify::ignoreRoutes();

        $request = request();

        // check if route start with admin/
        if ($request->is('admin/*')) {
            
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.password', 'admins');
            Config::set('fortify.prefix', 'admin');
        }

        if ($request->is('vendor/*')) {
            Config::set('fortify.guard', 'vendor');
            Config::set('fortify.password', 'vendors');
            Config::set('fortify.prefix', 'vendor');

        }

        if ($request->is('delivery/*')) {
            Config::set('fortify.guard', 'delivery');
            Config::set('fortify.password', 'deliveries');
            Config::set('fortify.prefix', 'delivery');

        }

        // redirect user , admin , vendor and delivery after login
        $this->app->instance(
            LoginResponse::class,
            new class () implements LoginResponse {
                public function toResponse($request)
                {
                    
                    // $request->user('admin') // admin -> guard_name
                    if ($request->user('admin')) {
                        return redirect('/admin/dashboard');
                    }
                    if ($request->user('vendor')) {
                        return redirect('/vendor/dashboard');
                    }
                    if ($request->user('delivery')) {
                        return redirect('/delivery/dashboard');
                    }
                    return redirect('/');
                }
            }
        );

        

        $this->app->instance(RegisterResponse::class, new class () implements RegisterResponse {
            public function toResponse($request)
            {
                return redirect('/verify');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        /// if callback function is on class we will return it in array
        /// as a second element and class in first one
        /// if method was static we will send class "AuthenticateUser::class"
        /// if not we will send object "new AuthenticateUser"
        // Fortify::authenticateUsing([new AuthenticateUser,'authenticate']);

        $this->app->singleton(
            RegisterResponseContract::class,
            CustomRegisterResponse::class
        );

        // Fortify::createUsersUsing(CreateNewUser::class);
        // Fortify::createUsersUsing(RegisterUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        // Fortify::verifyEmailView(function () {
        //     return view('frontend.auth.verify');
        // });

        Fortify::verifyEmailView(function () { // <--- this
            return view('frontend.auth.verify');
        });


        // rate limiter for login
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            // user can send only 5 requests in one minute
            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });


        // custom code
        if (Config::get('fortify.guard') == 'admin') {
            /// this method will be used in "admin" guard only
            Fortify::authenticateUsing([new CustomAuthentication(),'authenticateAdmin']);
            /// put prefix for auth backend pages => /login/admin
            Fortify::viewPrefix('backend.auth.admin.');

        } elseif (Config::get('fortify.guard') == 'vendor') {
            /// this method will be used in "admin" guard only
            Fortify::authenticateUsing([new CustomAuthentication(),'authenticateVendor']);
            /// put prefix for auth backend pages => /login/admin
            Fortify::viewPrefix('backend.auth.vendor.');

        } elseif (Config::get('fortify.guard') == 'delivery') {
            /// this method will be used in "admin" guard only
            Fortify::authenticateUsing([new CustomAuthentication(),'authenticateDelivery']);
            /// put prefix for auth backend pages => /login/admin
            Fortify::viewPrefix('backend.auth.delivery.');

        } else {

            /// this method will be used in "web" guard only
            // this method return $user or false
            Fortify::authenticateUsing([new CustomAuthentication() , 'authenticateUser']);

            Fortify::createUsersUsing(RegisterUser::class, 'create');

            /// put prefix for auth frontend pages =>  /login
            Fortify::viewPrefix('frontend.auth.');

        }
    }
}