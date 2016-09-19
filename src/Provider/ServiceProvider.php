<?php
namespace Samcrosoft\Soccerama\Provider;
use Samcrosoft\Soccerama\SocceramaManager;

/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 21:22
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/soccerama.php' => config_path('soccerama.php'),
        ], 'config');
        
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/soccerama.php', 'soccerama'
        );


        $this->app->singleton('soccerama', function ($app) {
            return new SocceramaManager($app);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return string
     */
    public function provides()
    {
        return ['soccerama'];
    }


}