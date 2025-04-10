<?php

namespace App\Exceptions;

use Crypt;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Verifică dacă excepția este de tipul HttpException (pentru 4xx și 5xx)
        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            // Folosim switch pentru a verifica tipul de eroare
            switch ($statusCode) {
                case 404:
                    return response()->view('errors.404', [], 404);
                case 500:
                    return response()->view('errors.500', [], 500);
                case 403:
                    return response()->view('errors.403', [], 403);
                case 419:
                    return response()->view('errors.419', [], 419);
                case 401:
                    return response()->view('errors.401', [], 401);
                // Poți adăuga alte cazuri pentru alte tipuri de erori
                default:
                    // Dacă codul de eroare nu este gestionat, folosim comportamentul implicit
                    return parent::render($request, $exception);
            }
        }

        // Returnează comportamentul implicit pentru alte excepții
        return parent::render($request, $exception);
    }
}
