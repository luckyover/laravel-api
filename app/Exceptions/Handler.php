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
use App\Models\ResponseResource;
use App\Exceptions\StoreException;
use PhpParser\Node\Stmt\TryCatch;

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

                $message = 'Unauthorized';
                $statusCode = Response::HTTP_UNAUTHORIZED;

                break;

            case $exception instanceof NotFoundHttpException:
                $message = 'Page not found';
                $statusCode = Response::HTTP_NOT_FOUND;
                break;

            case $exception instanceof ModelNotFoundException:
                $message = 'Model not found';
                $statusCode = Response::HTTP_NOT_FOUND;
                break;

            case $exception instanceof QueryException:
                    $message = 'Database error';
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
            case  $exception instanceof StoreException:
                $message = $exception->getMessage();
                $statusCode = $exception->getCode();
                $errors = [
                    'error' => $exception->errors(),
                    'trace'=> array_values($filteredTrace),
                ];
                break;
            default:
                 // Handle unknown exceptions
                 $message = 'Internal error';
                 $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
                 $errors = [
                    'error' => $exception->getMessage(),
                    'trace'=> array_values($filteredTrace),
                ];
                break;
        }

        // Use ErrorResource for API error responses

        if ($request->is('*api*')) {
            try{

                $response  = new ResponseResource(null);

                $response -> dataError  = $errors;
                $response -> message = $message;
                $response -> status  = $statusCode;

                return response()->json($response, $statusCode);
            } catch (\Throwable $th) {
                dd($th);
            }


        }


        // Default web response (non-API requests)
        return response()->json($message, $statusCode);
    }
}
