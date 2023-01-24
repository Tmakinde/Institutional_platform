<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable; // <-- ADD THIS

class Handler extends ExceptionHandler
{
    public function report(Throwable $exception) // <-- USE Throwable HERE
    {
        parent::report($exception);
    }
    public function render($request, Throwable $exception) // AND HERE
    {
        return parent::render($request, $exception);
    }
}