<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $models = ['User'];
        foreach ($models as $idx => $model) {
            $this->app->bind(
                "App\Repositories\Backend\Eloquent\\$model\\".$model."RepositoryInterface", 
                "App\Repositories\Backend\Eloquent\\$model\\".$model."Repository"
            ); 
        }
        $this->app->bind(
            "App\Repositories\Backend\Eloquent\Repository",
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
