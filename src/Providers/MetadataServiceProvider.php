<?php

namespace JobMetric\Metadata\Providers;

use Illuminate\Support\ServiceProvider;
use JobMetric\Metadata\MetadataService;

class MetadataServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('MetadataService', function ($app) {
            return new MetadataService($app);
        });
    }

    /**
     * boot provider
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerMigrations();
        $this->registerPublishables();

        // set translations
        $this->loadTranslationsFrom(realpath(__DIR__.'/../../lang'), 'metadata');
    }

    /**
     * Register the Passport migration files.
     *
     * @return void
     */
    protected function registerMigrations(): void
    {
        if($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }
    }

    /**
     * register publishables
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        if($this->app->runningInConsole()) {
            // publish migration
            $this->publishes([
                realpath(__DIR__.'/../../database/migrations') => database_path('migrations')
            ], 'metadata-migrations');
        }
    }
}
