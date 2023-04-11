<?php

declare(strict_types=1);

namespace App\Application;

class ErrorHandler
{

    public function register(): void
    {
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
    }

    public function exceptionHandler(\Throwable $e): void
    {
        http_response_code($e->getCode());
        header('Content-Type: application/json');

        if ($e->getMessage() !== '') {
            echo $e->getMessage();
        } else {
        echo json_encode([
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTrace(),
        ], JSON_THROW_ON_ERROR);
        }
    }

    public function errorHandler(int $errno,string $errstr,string $errfile,int $errline): bool
    {
        http_response_code(500);
        header('Content-Type: application/json');

//        if ($e->getMessage() !== '') {
//            echo $e->getMessage();
//        } else {
//            echo json_encode([
//                'file' => $e->getFile(),
//                'line' => $e->getLine(),
//                'trace' => $e->getTrace(),
//            ], JSON_THROW_ON_ERROR);
//        }
        echo json_encode([
            'errorNumber' => $errno,
            'errorString' => $errstr,
            'errorFile' => $errfile,
            'errorLine' => $errline,
        ], JSON_THROW_ON_ERROR);

        return false;
    }

}
