<?php

namespace GvsuWebTeam\Webteam\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

class ServiceProvider extends BaseServiceProvider
{
    protected $root = __DIR__.'/../..';

    protected $prefix = 'webteam';

    protected $configFiles = [
        'cms',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadMigrationsFrom($this->root . '/database/migrations');
        $this->loadRoutesFrom($this->root . '/routes/web.php');
        $this->loadViewsFrom($this->root . '/resources/views', $this->prefix);
        
        /* 
        | Make each package config file publishable under the tag `prefix` and located
        | in the main application's config folder as `config/<prefix>/<filename>`
        |
        */
        collect($this->configFiles)->each(function ($config) {
            $this->publishes(["{$this->root}/config/$config.php" => config_path("{$this->prefix}/$config.php")], $this->prefix);
        });


        // Breadcrumbs -- for every view in the package scope, define and include selected breadcrumb trail from the config
        view()->creator("{$this->prefix}::*", function (View $view) {
            $config = config("{$this->prefix}.cms.breadcrumbs");
            if ($view->breadcrumbs && array_key_exists($view->breadcrumbs, $config)) {
                $breadcrumbs = $config[$view->breadcrumbs];
            } else {
                $breadcrumbs = [];
            }
            $view->with('breadcrumbs', $breadcrumbs);
        });
        
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        collect($this->configFiles)->each(function ($config) {
            $this->mergeConfigFrom("{$this->root}/config/$config.php", "{$this->prefix}.$config");
        });
    }

}
