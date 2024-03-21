<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        if(\DB::connection()->getDatabaseName() !== ':memory:'){
            throw new \Exception('run composer dumpautoload');
        }
        return $app;
    }
}
