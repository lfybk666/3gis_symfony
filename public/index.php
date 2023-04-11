<?php

declare(strict_types=1);

use App\Application\Application;
use App\Controller\RubricController;
use App\Application\ErrorHandler;

require_once __DIR__ . '/../autoload.php';

(new ErrorHandler())->register();

$app = new Application();

$app->router->get('/', function () {
    echo 'index';
});
$app->router->get('/rubrics', [new RubricController, 'getRubricList']);

$response = $app->run();
$response->send();
