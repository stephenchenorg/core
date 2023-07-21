<?php

namespace Stephenchen\Core;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Stephenchen\Core\Commands\InitialCommandPart1;
use Stephenchen\Core\Http\Backend\Member\MemberRepository;
use Stephenchen\Core\Http\Middleware\AuthenticateAssignGuard;
use Stephenchen\Core\Http\Middleware\AuthenticateJwtVerify;
use Stephenchen\Core\Http\Middleware\SetLanguage;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Router $router
     * @param Kernel $kernel
     */
    public function boot(Router $router, Kernel $kernel)
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'core');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'core');

        // Load database relate
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadMigrationsFrom(__DIR__ . '/../database/seeders');

        // load routers
        $this->loadRoutesFrom(__DIR__ . '/../routes/develop.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/v1/backend.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/v1/frontend.php');

        // cf. https://laracasts.com/discuss/channels/general-discussion/register-middleware-via-service-provider?page=2
        $router->aliasMiddleware('set.language', SetLanguage::class);
        $router->aliasMiddleware('auth.jwt.verify', AuthenticateJwtVerify::class);
        $router->aliasMiddleware('auth.assign.guard', AuthenticateAssignGuard::class);

        $this->registerModelBindings();

        $this->loadTranslations();

        if ($this->app->runningInConsole()) {

            $this->offerPublishing();

            $this->registerMacroHelpers();

            $this->registerCommands();
        }
    }

    private function registerModelBindings()
    {
//        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
    }

    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'core');
    }

    private function offerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('stephenchen-core-config.php'),
        ], 'stephenchen-core-config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/core'),
        ], 'views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/core'),
        ], 'assets');*/
    }

    private function registerMacroHelpers()
    {

    }

    private function registerCommands(): void
    {
        $this->commands([
            InitialCommandPart1::class,
        ]);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'stephenchen-core-config');

        // Register the main class to use with the facade
        $this->app->singleton('core', function () {
            return new Core;
        });
    }
}
