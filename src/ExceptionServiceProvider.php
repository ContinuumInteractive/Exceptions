<?php

namespace Continuum\Exceptions;

use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{
    /**
     * @const string
     */
    const _NAMESPACE = 'exceptions';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->manageConfig();
        $this->manageLang();
    }

    /**
     * Manage the configuration loading and publishing.
     *
     * @return void
     */
    protected function manageConfig()
    {
        $path = __DIR__.'/../config/exceptions.php';

        $this->mergeConfigFrom($path, self::_NAMESPACE);

        $this->publishes([
            $path => config_path(self::_NAMESPACE.'.php'),
        ], 'config');
    }

    /**
     * Manage the Language loading and publishing.
     *
     * @return void
     */
    protected function manageLang()
    {
        $path = __DIR__.'/../resources/lang';

        $this->loadTranslationsFrom($path, self::_NAMESPACE);

        $this->publishes([
            $path => resource_path('lang/vendor/continuum/exceptions'),
        ], 'lang');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //...
    }
}
