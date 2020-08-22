<?php

namespace Vespera\LaravelFormComponents;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Vespera\LaravelFormComponents\FormDataBinder;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'form-components');

        $this->app->singleton(FormDataBinder::class, function() {
            return new FormDataBinder;
        });
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Publish config and view files
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('form-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/form-components'),
            ], 'views');
        }

        // Set views folder
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'form-components');

        // Set directives
        Blade::directive('bind', function ($bind) {
            return '<?php app(\Vespera\LaravelFormComponents\FormDataBinder::class)->bind(' . $bind . '); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\Vespera\LaravelFormComponents\FormDataBinder::class)->pop(); ?>';
        });

        // Set components
        Collection::make(config('form-components.components'))->each(function($component, $alias) {
            return Blade::component($alias, $component['class']);
        });
    }
}
