<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('dashboard')
                ->as('dashboard.')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->prefix('applicant')
                ->as('applicant.')
                ->group(base_path('routes/applicant.php'));

            Route::middleware('web')
                ->prefix('company')
                ->as('company.')
                ->group(base_path('routes/company.php'));


            Route::middleware('web')
                ->group(base_path('routes/auth.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function (Request $request) {
            $isAdmin = $request->is('dashboard') || $request->is('dashboard/*') || $request->is('*/dashboard') || $request->is('*/dashboard/*');
            $isApplicant = $request->is('applicant') || $request->is('applicant/*') || $request->is('*/applicant') || $request->is('*/applicant/*');
            $isCompany = $request->is('company') || $request->is('company/*') || $request->is('*/company') || $request->is('*/company/*');

            if ($isApplicant || $isCompany) {
                return route('login');
            }

            if ($isAdmin) {
                return route('dashboard.login');
            }

            return route('login');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
