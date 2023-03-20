<?php

declare(strict_types=1);

require __DIR__ . '/autoload.php';

use Model\Rubric;
use Services\DBConnection;

class b
{



}

$connection = DBConnection::getInstance();
$rubrics = $connection->query('select * from rubric');
$rubrics->setFetchMode(PDO::FETCH_CLASS, Rubric::class);
foreach ($rubrics as $rubric) {
    print_r($rubric);
}
