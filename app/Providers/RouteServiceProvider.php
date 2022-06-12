<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
     protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            /////////////////////////////////////////


            Route::prefix('clinic')
               // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/clinic.php'));


            ///////////////////////////////////////////

            Route::prefix('device')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/device.php'));


            ///////////////////////////////////////////

            Route::prefix('doctor')
                 ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/doctor.php'));


            ///////////////////////////////////////////

            Route::prefix('medical_log')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/medical_log.php'));


            ///////////////////////////////////////////


            Route::prefix('ml_dental')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/ml_dental.php'));


            ///////////////////////////////////////////

            Route::prefix('ml_dermatology_leaser')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/ml_dermatology_leaser.php'));


            ///////////////////////////////////////////


            Route::prefix('ml_nutrition')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/ml_nutrition.php'));


            ///////////////////////////////////////////



            Route::prefix('offers')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/offers.php'));


            ///////////////////////////////////////////

            Route::prefix('patient')
                 ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/patient.php'));


            ///////////////////////////////////////////
            Route::prefix('reception')
                 ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/reception.php'));


            ///////////////////////////////////////////

            Route::prefix('reservation')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/reservation.php'));


            ///////////////////////////////////////////
              Route::prefix('review')
                // ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/review.php'));
              ///////////////////////////////////////////
              Route::prefix('admin')
                 ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));


            ///////////////////////////////////////////



            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('clinic', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        //////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('doctor', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('device', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('medical_log', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('ml_dental', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('ml_dermatology_leaser', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('ml_nutrition', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('offers', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('patient', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('reception', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('reservation', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('review', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        RateLimiter::for('admin', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });


    }
}
