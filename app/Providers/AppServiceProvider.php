<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AddressService;
use App\Services\Implementations\AddressServiceImpl;
use App\Daos\AddressDAO;
use App\Daos\Implementations\AddressDAOImpl;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AddressService::class,AddressServiceImpl::class);
        $this->app->bind(AddressDAO::class,AddressDAOImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
