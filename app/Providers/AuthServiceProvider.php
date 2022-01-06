<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineGateVanBanDen();

        $this->defineGateVanBanDi();
    }

    public function defineGateVanBanDen(){
        Gate::define('danh-sach-van-ban-den', 'App\Policies\VanBanDenPolicy@view');
        Gate::define('them-van-ban-den', 'App\Policies\VanBanDenPolicy@create');
        Gate::define('sua-van-ban-den', 'App\Policies\VanBanDenPolicy@update');
        Gate::define('xoa-van-ban-den', 'App\Policies\VanBanDenPolicy@delete');
    }

    public function defineGateVanBanDi(){
        Gate::define('danh-sach-van-ban-di', 'App\Policies\VanBanDiPolicy@view');
        Gate::define('them-van-ban-di', 'App\Policies\VanBanDiPolicy@create');
        Gate::define('sua-van-ban-di', 'App\Policies\VanBanDiPolicy@update');
        Gate::define('xoa-van-ban-di', 'App\Policies\VanBanDiPolicy@delete');
    }
}
