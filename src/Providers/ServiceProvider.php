<?php

namespace GvsuWebTeam\Webteam\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/Webteam.php', 'webteam');

        $this->publishConfig();

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'webteam');
        // $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->registerRoutes();

        // Breadcrumbs -- Initialize breadcrumb array in the breadcrumbs component.
        // Then Controllers, can add push to it.
        view()->creator('webteam::*', function (View $view) {
            $config = config('webteam.cms.breadcrumbs');
            if ($view->breadcrumbs && array_key_exists($view->breadcrumbs, $config)) {
                $breadcrumbs = $config[$view->breadcrumbs];
            } else {
                $breadcrumbs = [];
            }
            $view->with('breadcrumbs', $breadcrumbs);
        });
        view()->creator('components.layout.cms.admin.template', function (View $view) {
            $menu[config('webteam.cms.path')] = config('webteam.cms.custom') ?? [];
            $view->with('menu', $menu);
        });
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }

    /**
    * Get route group configuration array.
    *
    * @return array
    */
    private function routeConfiguration()
    {
        return [
            'namespace'  => "GvsuWebTeam\Webteam\Http\Controllers"
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('webteam', function () {
            return new Webteam;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/Webteam.php' => config_path('Webteam.php'),
            ], 'config');
        }
    }
}
