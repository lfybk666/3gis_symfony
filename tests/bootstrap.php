<?php
declare(strict_types=1);

use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

ErrorHandler::register(null, false);

if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}
