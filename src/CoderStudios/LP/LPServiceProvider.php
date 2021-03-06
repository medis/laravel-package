<?php

namespace CoderStudios\LP;

use Illuminate\Support\ServiceProvider;

class LPServiceProvider extends ServiceProvider 
{
  	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'lp');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'laravel-package');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/laravel-package'),
        ], 'lang');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/lp'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../../config/lp.php' => config_path('lp.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/lp'),
        ], 'public');

        $this->app->make('view')->composer('vendor.lp.master','CoderStudios\LP\Composers\MasterComposer');
	}
}