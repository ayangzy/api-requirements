<?php

namespace App\Exceptions;

use App\Traits\ApiResponses;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponses;
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $exception, $request) {
            return $this->handleException($exception, $request);
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param \Throwable $exception
     *
     * @return Response|JsonResponse
     *
     * @throws \Throwable
     */
    public function handleException(Throwable $exception, $request)
    {
        if ($exception instanceof NotFoundHttpException) {
            return $this->notFoundAlert('We cannot access this resource you\'re looking for', 'resource_not_found');
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->notFoundAlert('Unable to locate model resource', 'model_not_found');
        }
    }
}
