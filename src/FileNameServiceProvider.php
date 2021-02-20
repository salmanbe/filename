<?php

namespace Salmanbe\FileName;

use Illuminate\Support\ServiceProvider;

class FileNameServiceProvider extends ServiceProvider {

    public function boot() {

        $this->publishes([
            __DIR__ . '/config.php' => config_path('filename.php'),
        ]);
    }

    public function register() {

        $this->app->bind('filename', function($app) {
            return new FileName($app);
        });

        config(['config/filename.php']);
    }

}
