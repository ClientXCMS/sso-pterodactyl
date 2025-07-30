<?php

namespace ClientXCMS\Sso;

use Illuminate\Support\ServiceProvider;
use ClientXCMS\Sso\Commands\GenerateSecretKey;

class SsoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            GenerateSecretKey::class,
        ]);

        // Registration of the configuration filess
        $this->publishes([
            __DIR__ . '/config/sso-clientxcms.php' => config_path('sso-clientxcms.php'),
        ], 'sso-clientxcms');

        // Registration of routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api-application.php');
    }

    public function register()
    {
        // Download configuration file
        $this->mergeConfigFrom(
            __DIR__ . '/config/sso-clientxcms.php',
            'sso-clientxcms'
        );
    }
}
