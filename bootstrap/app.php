<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e, $request) {
            if (!$request->expectsJson()) {
                return response()->view('pages.error', ['code' => 404], 404);
            }
        });

        $exceptions->renderable(function (Throwable $e, $request) {
            if (!$request->expectsJson()) {
                $statusCode = $e instanceof HttpExceptionInterface ? $e->getStatusCode() : 500;

                return response()->view('pages.error', ['code' => $statusCode], $statusCode);
            }
        });
    })->create();
