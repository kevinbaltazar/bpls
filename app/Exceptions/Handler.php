<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
    }

    public function render($request, Throwable $e)
    {
        // if ($request->expectsJson()) {
        //     return response()->json(['message' => $e->getMessage()], 401);
        // }

        // if (Str::startsWith($request->path(), 'admin')) {
        //     return redirect()->guest(route('admin.login'));
        // }

        // 

        // 404 page when a model is not found
        if ($e instanceof ModelNotFoundException) {
            return response()->view('errors.404', [], 404);
        }

        // custom error message
        if ($e instanceof \ErrorException) {
            return response()->view('errors.500', [], 500);
        } else {
            return parent::render($request, $e);
        }

        // return parent::render($request, $e);
        return redirect()->guest(route('login'));
    }
}
