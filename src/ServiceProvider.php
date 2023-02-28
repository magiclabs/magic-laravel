<?php

namespace MagicLaravel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton(Magic::class, function () {
            $magic = new Magic(
                config('magic.secret_api_key'),
                config('magic.http.timeout'),
                config('magic.http.retries'),
                config('magic.http.backoff_factor')
            );

            $magic->_set_platform('laravel');

            return $magic;
        });
    }

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/magic.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

    /**
     * Get the config path.
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('magic.php');
    }

    /**
     * Publish the config file.
     *
     * @param string $configPath
     */
    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('magic.php')], 'config');
    }
}
