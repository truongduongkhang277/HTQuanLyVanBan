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
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

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

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });

        $this->getBoPhanRoute();

        $this->getCoQuanRoute();

        $this->getDoKhanRoute();

        $this->getDoMatRoute();

        $this->getHinhThucRoute();

        $this->getHinhThucChuyenRoute();

        $this->getHinhThucLuuRoute();

        $this->getLinhVucRoute();

        $this->getNguoiDungRoute();

        $this->getQuyenTruyCapRoute();

        $this->getTheLoaiRoute();

        $this->getTrangThaiRoute();

        $this->getVaiTroRoute();

        $this->getVanBanDenRoute();

        $this->getVanBanDiRoute();
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
    }

    public function getBoPhanRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/boPhan.php'));
    }

    public function getCoQuanRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/coQuan.php'));
    }

    public function getDoKhanRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/doKhan.php'));
    }

    public function getDoMatRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/doMat.php'));
    }

    public function getHinhThucRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/hinhThuc.php'));
    }

    public function getHinhThucChuyenRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/hinhThucChuyen.php'));
    }

    public function getHinhThucLuuRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/hinhThucLuu.php'));
    }

    public function getLinhVucRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/linhVuc.php'));
    }

    public function getNguoiDungRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/nguoiDung.php'));
    }

    public function getQuyenTruyCapRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/quyenTruyCap.php'));
    }

    public function getTheLoaiRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/theLoai.php'));
    }

    public function getTrangThaiRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/trangThai.php'));
    }

    public function getVaiTroRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/vaiTro.php'));
    }

    public function getVanBanDenRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/vanBanDen.php'));
    }

    public function getVanBanDiRoute(){
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admins/vanBanDi.php'));
    }
}
