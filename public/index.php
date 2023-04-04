<?php

declare(strict_types=1);

use App\Application\Application;
use App\Controller\RubricController;

require_once __DIR__ . '/../autoload.php';

$app = new Application();

$app->router->get('/', function () {
    echo 'index';
});
$app->router->get('/rubrics', [new RubricController, 'getRubricList']);

$app->run();
