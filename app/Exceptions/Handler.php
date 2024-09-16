<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use App\Utility\Log\Facades\Log;
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
        $trace = $exception->getTrace();
        $baseAppPath = str_replace('/', DIRECTORY_SEPARATOR, base_path('app/'));

        // Lọc trace chỉ lấy các file trong thư mục 'app/' của bạn
        $filteredTrace = array_filter($trace, function ($traceItem) use ($baseAppPath) {
            return isset($traceItem['file']) && strpos($traceItem['file'], $baseAppPath) !== false;
        });

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
            case $exception instanceof QueryException:
                    $message = __('messages.errors.database_error');
                    $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
                    $errors = [
                        'error' => $exception->getMessage(),
                        'trace'=> array_values($filteredTrace),
                    ];
                    break;
             case $exception instanceof ValidationException:
                    $message = 'Validation failed';
                    $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
                    $errors = [
                        'error' => $exception->errors(),
                    ];
                break;

            default:
                 // Handle unknown exceptions
                 $message = __('messages.errors.internal_error');
                 $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
                 $errors = [
                    'error' => $exception->getMessage(),
                    'trace'=> array_values($filteredTrace),
                ];

                break;
        }

        Log::insert('database_log', 'error', '[EXCEPTION]:' . print_r($errors, true));
        // Use ErrorResource for API error responses
        if ($request->is('*api*')) {
            return response()->json([
                'message' => $message,
                'errors' => $errors,
                'status' => $statusCode,
            ], $statusCode);
        }

        // Default web response (non-API requests)
        return response($message, $statusCode);
    }
}
