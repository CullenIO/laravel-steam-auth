<?php
namespace Cullenio\SteamAuth\Providers;

class SteamAuthServiceProvider extends ServiceProvider {

    public function register() {
        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/steam_auth.php' => config_path('steam_auth.php')
        ]);
    }

    public function boot() {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/../routes.php';
        }
    }

}
