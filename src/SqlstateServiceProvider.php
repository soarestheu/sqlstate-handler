<?php

namespace SqlstateHandler;

use Illuminate\Support\ServiceProvider;


class SqlstateServiceProvider extends ServiceProvider
{
    public function register()
    {
      $this->app->singleton('sqlstate.handler', function () {
          return new class {
              use \SqlstateHandler\HandlerQueryException;
          };
      });
    }

    public function boot()
    {
      if ($this->app->runningInConsole()) {
        $this->publishes([
            __DIR__.'/../config/sqlstate.php' => config_path('sqlstate.php'),
        ], 'config');
      }
    }
}
