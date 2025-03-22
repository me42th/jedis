<?php

/*
|--------------------------------------------------------------------------
| Web Application
|--------------------------------------------------------------------------
|
| Este arquivo serve para carregar o aplicativo web e responder a solicitações.
| Você pode personalizar este arquivo conforme necessário para o seu aplicativo.
|
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
