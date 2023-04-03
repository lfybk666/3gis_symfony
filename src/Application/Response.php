<?php

namespace App\Application;

class Response
{


    public function __construct()
    {

    }

    public function setStatusCode(int $code): void
    {
        http_response_code($code);
    }

}
