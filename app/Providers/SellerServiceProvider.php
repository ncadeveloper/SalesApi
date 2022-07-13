<?php

namespace App\Providers;

use App\Models\Seller;
use App\Repositories\Eloquent\SellerRepository;
use Illuminate\Support\ServiceProvider;

class SellerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\SellerInterfaceRepository', 'App\Repositories\SellerRepository');
        $this->app->bind('App\Repositories\Interfaces\SellerInterfaceRepository', function ($app) {
            return new SellerRepository(new Seller());
        });
    }

    public function boot()
    {
        //
    }
}
