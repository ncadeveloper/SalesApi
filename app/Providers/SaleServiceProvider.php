<?php

namespace App\Providers;

use App\Models\Sale;
use App\Repositories\Eloquent\SaleReportRepository;
use App\Repositories\Eloquent\SaleRepository;

use Illuminate\Support\ServiceProvider;

class SaleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\SaleInterfaceRepository', 'App\Repositories\SaleRepository');
        $this->app->bind('App\Repositories\Interfaces\SaleReportInterfaceRepository', 'App\Repositories\SaleReportRepository');
        $this->app->bind('App\Repositories\Interfaces\SaleInterfaceRepository', function ($app) {
            return new SaleRepository(new Sale());
        });
        $this->app->bind('App\Repositories\Interfaces\SaleReportInterfaceRepository', function ($app) {
            return new SaleReportRepository(new Sale());
        });
    }

    public function boot()
    {
        //
    }
}
