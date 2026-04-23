<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*'); // Mempercayai semua proxy (aman karena di belakang Cloudflare Tunnel)
        $middleware->alias([
            'role'               => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission'         => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // Jika user SUDAH login tapi nyasar ke halaman login/register,
        // arahkan mereka ke Dashboard Admin, bukan ke Home
        $middleware->redirectUsersTo('/admin/dashboard');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
