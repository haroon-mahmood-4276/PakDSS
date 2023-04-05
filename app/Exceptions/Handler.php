<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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

    public function render($request, Throwable $exception)
    {
        if (auth()->check()) {
            $exceptionCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : $exception->getCode();
            $exceptionCode = $exceptionCode > 0 ? $exceptionCode : 500;

            if (in_array($exceptionCode, [401, 402, 403, 404, 419, 500, 503])) {
                $view = '';
                switch ($request->segment(1)) {
                    case 'admin':
                        $view = 'admin.errors.';
                        break;

                    case 'seller':
                        $view = 'seller.errors.';
                        break;

                    default:
                        $view = 'user.errors.';
                        break;
                }

                $view .= $exceptionCode;
                return response()->view($view);
            }
        }

        return parent::render($request, $exception);
    }
}
