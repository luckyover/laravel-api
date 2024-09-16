<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function render($request, Throwable $exception)
    {
        // Define default status and message
        $statusCode = Response::HTTP_BAD_REQUEST;
        $message = __('messages.errors.bad_request');
        $errors = null;

        switch (true) {
            case $exception instanceof AuthenticationException:
                $message = __('messages.errors.unauthorized');
                $statusCode = Response::HTTP_UNAUTHORIZED;
                break;

            case $exception instanceof NotFoundHttpException:
                $message = __('messages.errors.page_not_found');
                $statusCode = Response::HTTP_NOT_FOUND;
                break;

            case $exception instanceof ModelNotFoundException:
                $message = __('messages.errors.model_not_found');
                $statusCode = Response::HTTP_NOT_FOUND;
                break;

            case $exception instanceof ApiException:
                $message = $exception->getMessage();
                $statusCode = $exception->getCode();
                $errors = $exception->getData();
                break;

            default:
                break;
        }

        // Use ErrorResource for API error responses
        if ($request->is('*api*')) {
            return $this->makeErrorResponse($statusCode, $message, $errors);
        }

        // Default web response (non-API requests)
        return response($message, $statusCode);
    }
}
